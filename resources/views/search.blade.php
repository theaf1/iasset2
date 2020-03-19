@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form>
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_class">ต้องการค้นหา</label>
                            <select name="a" id="search_class" class="form-control">
                                <option value="" hidden></option>
                                <optgroup label="client">
                                    @foreach ($clienttypes as $clienttype)
                                        <option value="{{ $clienttype['id'] }}">{{ $clienttype['name'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="peripherals">
                                    @foreach ($peripheraltypes as $peripheraltype)
                                        <option value="{{ $peripheraltype['id'] }}">{{ $peripheraltype['name'] }}</option>
                                    @endforeach
                                    <option value="c">storage device</option>
                                </optgroup>
                                <optgroup label="infrastructure">
                                    <option value="d">server</option>
                                    @foreach ($netsubtypes as $netsubtype)
                                        <option value="{{ $netsubtype['id'] }}">{{ $netsubtype['name'] }}</option>
                                    @endforeach
                                    <option value="f">networked storage</option>
                                    <option value="g">UPS</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="property">มีคุณสมบัติ</label>
                            <select name="search_property" id="property" class="form-control">
                                <option value="" hidden></option>
                                <option value="1">thing1</option>
                                <option value="2">thing2</option>
                                <option value="3">thing3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_arg">ด้วย</label>
                            <input type="search" name="search_arg" id="search_arg" class="form-control">
                        </div>
                    </div>                
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="ops"></label>
                            <select class="form-control" id="ops">
                                <option value="1">></option>
                                <option value="2"><</option>
                                <option value="3">=</option>
                                <option value="4">>=</option>
                                <option value="5"><=</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection