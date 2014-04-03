@extends('layout.layout_main')
    
    <?php 
    //      /catalogue/index
    ?>

@section('content')
    
    <div id="catalogue-holder">
        <article id="catalogue-list">
            <div class="row">
                <header class="col-xs-12">
                    <h1>
                        <?php if($items): ?>
                            {{ Lang::get('catalogue.search_title') }}: <em>{{{ isset($searchTerm) ? $searchTerm : '' }}}</em>
                        <?php else: ?>
                            Not found...
                        <?php endif; ?>
                    </h1>
                </header>
            </div>

            <div class="row">
                <section class="col-xs-12">
                    <?php if( isset($items) ): ?>
                        
                        <?php if(count( $items ) > 0):  ?>
                            <p>
                                <strong>
                                    {{ count( $items ) }} {{ Lang::choice('catalogue.listing_count', count($items)) }}
                                </strong>
                            </p>

                            @include('catalogue.partial.listing_table')

                        <?php else: ?>
                            <p class="alert alert-warning">
                                <strong>No results found</strong>
                            </p>

                            <h4>New search:</h4>  

                            @include('catalogue.partial.search_form')

                        <?php endif; ?>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <h4>{{ Lang::get('messages.error_heading') }}</h4>
                            <p>
                                {{ Lang::get('messages.empty_listing') }}
                            </p>
                        </div>

                        <div class="col-xs-12">
                            <h4>Search:</h4>           
                            @include('catalogue.partial.search_form')

                        </div>
                    <?php endif; ?>
                </section>
            </div>

        </article>
    </div>
@stop