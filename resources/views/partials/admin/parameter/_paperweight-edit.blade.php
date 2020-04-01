<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Paper Weight</h2>

        <div class="card-body col-md-12">

            <form class="form-group-inline" method="POST" action="{{ route('paper.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" name="name" value="{{ $data->paper_weight }}" type="text" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In English</label>
                    <input class="form-control" id="name_in_en" name="name_in_en" value="{{ $data->name_english }}" type="text" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In DEUTSCH</label>
                    <input class="form-control" id="name_in_dh" name="name_in_dh" value="{{ $data->name_german }}" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Weight per sheet</label>
                    <input class="form-control" id="weight_per_sheet" name="weight_per_sheet" value="{{ $data->weight_per_sheet }}" type="text" value="0" placeholder="Weight per sheet" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Minimum number of sheets for spine</label>
                    <input class="form-control" id="min_sheets_for_spine" name="min_sheets_for_spine" value="{{ $data->min_sheets_for_spine }}" type="text" value="0" placeholder="Min number of sheet for spine" required />
                </div>

                <div class="form-group">
                    <h2><label class="small mb-1" for="name">Letters for spine</label></h2>
                    <table id="paper_weight_edit_table">
                        <tr>
                            <th>Sheets</th>
                            <th></th>
                            <th>Letters</th>
                        </tr>

                        @if(!empty($attributes))
                        @foreach ($attributes as $key => $value)
                        <tr class="form-inline">
                           <input id="from" type="hidden" name="id[]" value="{{ $value['id'] }}" />
                           <td><input id="from" type="hidden" name="sheet_start[]" value="{{ $value['sheets_range_start'] }}" />{{ $value['sheets_range_start'] }}</td>
                           <td><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="{{ $value['sheets_range_end'] }}" />{{ $value['sheets_range_end'] }}</td>
                           <td><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="{{ $value['letters'] }}" /></td>
                       </tr>
                       @endforeach
                       @else
                       <tr class="form-inline">
                           <td><input id="from" type="hidden" name="sheet_start[]" value="0" />0</td>
                           <td><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="65" />65</td>
                           <td><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="40" /></td>
                       </tr>
                       @endif

                   </table>
               </div>

               <div class="form-group">
                <button type="button" class="btn btn-primary btn-sm mr-2" id="paper_weight_edit_add_new_row"> <span>Add new row</span></button>
                <button type="button" class="btn btn-danger btn-sm mr-2" id="paper_weight_edit_remove_last"> <span>Remove last row</span></button>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" <?php echo ($data->status) ? 'checked' : ''; ?> name="active">
                    <label class="custom-control-label" for="customCheck">Active</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
            </div>


        </form>

    </div>

</div>


<style>
tr>th {
    padding: 8px;
}

tr>td {
    padding: 8px;
}
</style>