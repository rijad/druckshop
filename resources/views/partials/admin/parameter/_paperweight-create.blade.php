<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Paper Weight</h2>

        <div class="card-body col-md-6">

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
                    <input class="form-control" id="min_sheets_for_spine" name="min_sheets_for_spine" type="text" value="0" placeholder="Min number of sheet for spine" required />
                </div>

                <div class="form-group ">
                    <h2><label class="small mb-1" for="name">Letters for spine</label></h2>
                    <table>
                        <tr>
                            <th>Sheets</th>
                            <th>Letters</th>
                        </tr>
                    </table>
                    <br>

                    <div class="paper_input">

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="0" />0</div> -
                                <div><input id="from" type="hidden" name="sheet_end[]" value="65" />65</div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" value="40" required /></div>
                            </div>
                        </div>

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="66" />66</div> -
                                <div><input id="from" type="hidden" name="sheet_end[]" value="150" />150</div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" value="130" /></div>
                                <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                            </div>
                        </div>

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="151" />151</div> -
                                <div><input id="from" type="hidden" name="sheet_end[]" value="190" />190</div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" value="160" /></div>
                                <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                            </div>
                        </div>

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="191" />191</div> -
                                <div><input id="from" type="hidden" name="sheet_end[]" value="250" />250</div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" value="205" /></div>
                                <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                            </div>
                        </div>

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="251" />251</div> -
                                <div><input id="from" type="hidden" name="sheet_end[]" value="300" />300</div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" value="265" /></div>
                                <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                            </div>
                        </div>

                        <div>
                            <div class="paper_div control-group form-inline">
                                <div><input id="from" type="hidden" name="sheet_start[]" value="301" />301</div> -
                                <div><input id="from" name="sheet_end[]" placeholder="sheet range" /></div>
                                <div><input class="form-control" id="latters" type="number" name="latters[]" placeholder="latter number" /></div>
                                <div><button type="button" class="btn btn-danger btn-sm mr-2 remove_paper"> <span>Remove</span></button></div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2 add_paper_row"> <span>Add new row</span></button>
                </div>

                <!-- <div class="control-group copy hide" style="display:none">

                    <div class="control-group form-inline">
                        <div><input id="from" type="hidden" name="from[]" value="0" />0</div>
                        <div><input class="form-control" id="to" type="number" name="to[]" /></div>
                        <div><input class="form-control" id="price" type="number" name="price[]" /></div>
                        <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                    </div>

                </div> -->

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