@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Catatan') }}</div>

                <div class="card-body">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Add Notes
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="POST" action="{{ route('simpan') }}">
                        @csrf
                        <div class="form group">
                            <label>Feeling</label>
                            <select class="form-control" name="feeling">
                                <option value="interesting">Interesting</option>
                                <option value="shock">Shock</option>
                                <option value="sad">Sad</option>
                                <option value="happy">Happy</option>
                                <option value="excited">Excited</option>
                            </select>
                        </div>
                        <div class="form group">
                            <label>Add Notes</label>
                        <textarea class="form-control" name="isi"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="simpan">
                    </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Feeling</th>
                        <th>Notes</th>
                        <th>Delete?</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <img src="{{ asset('foto/' . $data->feeling . '.png') }}" height="80px">
                        </td>
                        <td>{{ $data->isi }}</td>
                    <td>
                            <a href="{{ route('hapus', ['id'=>$data->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
