<table class="table" id="catalogue-table">
    <thead>
        <tr>    
            <th>{{ Lang::get('catalogue.label_title') }}</th>
            <th>{{ Lang::get('catalogue.label_description') }}</th>
            <th>etc...</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
            <tr>
                <td>
                    {{ link_to('/catalogue/' . $item->id , $title = $item->title) }}
                </td>
                <td>
                    {{{ $item->description }}}
                </td>
                <td>
                    etc...
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>