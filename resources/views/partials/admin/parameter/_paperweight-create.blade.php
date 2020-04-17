<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Paper Weight</h2>

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
                    <label class="small mb-1" for="name">Weight per sheet</label>
                    <input class="form-control" id="weight_per_sheet" name="weight_per_sheet" type="text" value="0" placeholder="Weight per sheet" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Minimum number of sheets for spine</label>
                    <input class="form-control min_sheets_for_spine" id="min_sheets_for_spine" name="min_sheets_for_spine" type="number" value="0" placeholder="Min number of sheet for spine" required />
                </div>

                <div class="form-group rv-responsivetable">
                    <h2><label class="small mb-1" for="name">Letters for spine</label></h2>
                    <table id="paper_weight_table">
                        <tr>
                            <th class="rv-headLt">Sheets</th>
                            <th class="rv-headRt">Letters</th>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input class="first_row" id="from" type="hidden" name="sheet_start[]" value="0" />0</td>
                            <td class="rv-headLtchild"><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="65" />65</td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="40" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input id="from" type="hidden" name="sheet_start[]" value="66" />66</td>
                            <td class="rv-headLtchild"><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="150" />150</td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="130" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input id="from" type="hidden" name="sheet_start[]" value="151" />151</td>
                            <td class="rv-headLtchild"><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="190" />190</td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="160" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input id="from" type="hidden" name="sheet_start[]" value="191" />191</td>
                            <td class="rv-headLtchild"><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="250" />250</td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="160" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input id="from" type="hidden" name="sheet_start[]" value="251" />251</td>
                            <td class="rv-headLtchild"><input class="sheet_end_input" id="from" type="hidden" name="sheet_end[]" value="300" />300</td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" value="265" required /></td>
                        </tr>

                        <tr class="form-inline">
                            <td class="rv-headLtchild1"><input class="form-control" id="from" type="hidden" name="sheet_start[]" value="301" />301</td>
                            <td class="rv-headLtchild"><input class="form-control sheet_end_input" id="from" type="number" name="sheet_end[]"  placeholder="sheet range" /></td>
                            <td class="rv-headRtchild"><input class="form-control latters_input" id="latters" type="number" name="latters[]" placeholder="latter number" /></td>
                        </tr>

                    </table>
                   


                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2" id="paper_weight_add_more" disabled="true"> <span>Add new row</span></button>
                    <button type="button" class="btn btn-danger btn-sm mr-2" id="paper_remove_last"> <span>Remove last row</span></button>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active">
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-inline">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
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