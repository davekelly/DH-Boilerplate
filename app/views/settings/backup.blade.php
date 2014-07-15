@extends('layout.layout_main')
    
    <?php 
    //      /settings/backup
    ?>

@section('content')

    <div class="row">
        
        <h1></h1>
        <h1 class="col-xs-offset-0 col-sm-offset-3">
            {{ Lang::get('settings.settings_title') }} > {{ Lang::get('settings.backup_title') }} 
        </h1>

        <div class="clearfix"></div>

        <div class="col-xs-12 col-sm-3">
            @include ('settings.partial.sidebar')
        </div>
        <div class="col-xs-12 col-sm-8">
            <h3>{{ Lang::get('settings.create_backup') }}</h3>

            <?php 
            // check that we have some backup data
            if($latestBackup->count() > 0): ?>
                <?php 
                    $vals = $latestBackup->toArray(); 
                    $destination = ''; 

                    if($vals[0]['destination'] === 'local'){
                        $destination = 'Downloaded ';
                    }elseif($vals[0]['destination'] === 'dropbox'){
                        $destination = 'Saved to Dropbox ';
                    }
                ?>
                <p class="help-block">
                    <strong>Last backup:</strong> {{ $latestBackup[0]->created_at->format('d M Y @ H:i:s') }}. {{ $destination }} by {{ $latestBackup[0]->user->email }}
                </p>
            <?php endif; ?>
            <ul>
                <li>
                    <a href="{{ url('settings/backup/local') }}">
                        {{ Lang::get('settings.create_backup_download') }}
                    </a>
                </li>
                <li>
                    <a href="{{ url('settings/backup/dropbox') }}">
                        {{ Lang::get('settings.create_backup_remote') }}
                    </a>
                </li>
            </ul>
        </div>

    
    </div> <!-- .row -->
@stop