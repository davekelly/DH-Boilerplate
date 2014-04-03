{{ Form::open(array('url' => '/catalogue/search', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'form')) }}
     <div class="form-group">
      <label class="sr-only" for="term">Search</label>
      <?php $searchTerm = (isset($searchTerm) ? $searchTerm : null); ?>
      {{ Form::text('term', $searchTerm, array('class' => 'form-control ', 'type' => 'search', 'id' => 'term', 'placeholder' => 'Search for...')) }}
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-sm btn-primary">
        Search
      </button>
    </div>
{{ Form::close() }}