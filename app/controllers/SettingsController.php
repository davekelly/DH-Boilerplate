<?php

class SettingsController extends \BaseController {

    


    public function backup($type = null)
    {
        $backup = new Backups();

        if( isset($type)){


            switch ($type) {
                case 'local':
                    

                    if(Auth::user()->role !== 'admin'){
                         
                         Session::flash('flash_notice', array(
                                'type' => 'danger', 
                                'message' => Lang::get('messages.permissions_to_low')
                            )
                        );

                        break;
                    }


                    // do backup
                    $backup->destination = 'local';
                    $backup->backupDatabase();
                    
                    // get local file location
                    $fileName       = $backup->getFileNameWithExtension();
                    $fileLocation   = storage_path() . '/backups/';


                    // set appropriate headers
                    if($backup->compression == 'gzip'){
                        $headers = array(
                            'Content-type'          => 'application/x-gzip'
                        );
                    }else{
                        $headers = array(
                            'Content-type'          => 'application/octet-stream'
                        );
                    }

                    return Response::download(
                        $fileLocation . $fileName,
                        $fileName, 
                        $headers
                    );

                    break;

                case 'dropbox': 

                    $backup->destination = 'dropbox';
                    $backup->backupDatabase();
                    
                    
                    // all good...give feedback and redirect to
                    // edit form        
                    Session::flash('flash_notice', array(
                            'type' => 'success', 
                            'message' => Lang::get('messages.backup_success')
                        )
                    );

                    break;
                default:    
                    // error - unrecognised backup type
                    Session::flash('flash_notice', array(
                            'type' => 'danger', 
                            'message' => Lang::get('messages.backup_unrecognised_format')
                        )
                    );

                    break;
            }
        }

        $latestBackup = $backup->getLastBackupTime();

        return View::make('settings.backup', array(
                'latestBackup' => $latestBackup
            )
        );
    }


    
}