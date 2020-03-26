<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Binding</h2>

        <div class="card-body col-md-12">

            <form class="form-group-inline" method="POST" action="{{ route('paper.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In English</label>
                    <input class="form-control" id="name_in_en" name="name_in_en" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Name In DEUTSCH</label>
                    <input class="form-control" id="name_in_dh" name="name_in_dh" type="text" placeholder="Name" required />
                </div>
                
                <div class="form-group">
                    <label class="small mb-1" for="name">Upload Binding Image</label>
                    <input class="form-control" type="file" id="name_in_dh" name="name_in_dh" required />
                </div>


                <div class="form-group">
                    <label class="small mb-1" for="name">Page Format</label>
                    <div class="form-inline">
                        @foreach ($pageFormat as $key => $value)
                        <span class="ml-4"><input type="checkbox" class="form-control" name="pageFormat[]" value="{{ $value->id }}" />{{ $value->page_format }}</span>
                        @endforeach

                    </div>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Cover Settings</label>
                    <div class="form-inline">
                        @foreach ($coverSetting as $key => $value1)
                        <span class="ml-4"><input type="checkbox" class="form-control" name="pageFormat[]" value="{{ $value1->id }}" />{{ $value1->cover_settings }}</span>
                        @endforeach

                    </div>
                </div>

                <div class="form-group ">
                    <h2><label class="small mb-1" for="name">Letters for spine</label></h2>
                    <table id="paper_weight_table">
                        <tr>
                            <th>Sheets</th>
                            <th></th>
                            <th>Letters</th>
                        </tr>

                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="sheet_start[]" value="0" />0</td>
                            <td><input id="from" type="hidden" name="sheet_end[]" value="65" />65</td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" value="40" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="sheet_start[]" value="66" />0</td>
                            <td><input id="from" type="hidden" name="sheet_end[]" value="150" />150</td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" value="130" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="sheet_start[]" value="151" />151</td>
                            <td><input id="from" type="hidden" name="sheet_end[]" value="190" />190</td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" value="160" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="sheet_start[]" value="191" />191</td>
                            <td><input id="from" type="hidden" name="sheet_end[]" value="250" />250</td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" value="160" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="sheet_start[]" value="251" />251</td>
                            <td><input id="from" type="hidden" name="sheet_end[]" value="300" />300</td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" value="265" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td><input class="form-control" id="from" type="hidden" name="sheet_start[]" value="301" />301</td>
                            <td><input class="form-control" id="from" name="sheet_end[]"  placeholder="sheet range" /></td>
                            <td><input class="form-control" id="latters" type="number" name="latters[]" placeholder="latter number" /></td>
                        </tr>

                    </table>



                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2" id="paper_weight_add_more"> <span>Add new row</span></button>
                    <button type="button" class="btn btn-danger btn-sm mr-2" id="paper_remove_last"> <span>Remove last row</span></button>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active">
                        <label class="custom-control-label" for="customCheck">AKTIV</label>
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