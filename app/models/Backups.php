<?php

class Backups extends Eloquent{

    /**
     * Underlying database table (for audit
     * storage)
     * @var string
     */
    protected $table = 'backups';

    /**
     * Instance of Backup manager
     * @var BigName\BackupManager\Manager
     */
    protected $backupManager;

    /**
     * Default connection to backup
     * @var string
     */
    protected $connection = 'mysql';


    /**
     * Fillable object properties
     * @var array
     */
    protected $fillable = array('user_id', 'filename', 'destination', 'compression');

    /**
     * Backup to where?
     * @var string
     */
    public $destination;


    /**
     * Compression of backup ('gzip' | 'null')
     * @var string
     */
    public $compression = 'gzip';

    /**
     * Name of backup file which includes
     * a timestamp of creation date
     * 
     * @var string
     */
    protected $filename = '';


    public function __construct($attributes = array())  {
        
        parent::__construct($attributes); 

        $this->filename = date('Y-m-d_H-i-s') . '.' . $this->connection . '.sql';
        
        if(!isset($attributes['destination'])){
            $this->destination = 'local';
        }

        $this->backupManager = App::make('BigName\BackupManager\Manager');    
        
    }


    /**
     * Relationship with User
     * @return 
     */
    public function user()
    {
        return $this->belongsTo('User');
    }


    /**
     * Carry out a backup
     * @return [type] [description]
     */
    public function backupDatabase()
    {
        $this->backupManager->makeBackup()->run(
            $this->connection, $this->destination,  $this->filename, $this->compression
        );

        $data = array(
            'destination'   => $this->destination,
            'filename'      => $this->filename,
            'compression'   => $this->compression,
            'user_id'       => isset(Auth::user()->id) ? Auth::user()->id : null,
        );

        // log backup action
        Backups::create($data);

        return $this;
    }

    /**
     * Check if file is gzipped, and add .gz to filename
     * Necessary if looking for file to download from 
     * local storage
     * 
     * @return string $filename
     */
    public function getFileNameWithExtension()
    {
        if($this->compression == 'gzip'){
            return $this->filename . '.gz';
        }

        return $this->filename;
    }

    /**
     * Get when the last backup was done
     * 
     * @return Collection
     */
    public function getLastBackupTime()
    {
        return $this->orderBy('created_at', 'DESC')->take(1)->get();
    }

    
}