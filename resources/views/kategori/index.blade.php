@extends('adminlte::page')

@section('tittle','Dasboard')

@section('content_header')

product category page

@endsection



@section('css')
 <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
  <script src="{{ asset('DataTables/datatables.min.css') }}"></script>
  <script>
      $(document).ready(function() {
          $('#example').DataTable();
      });
      </script>
@endsection

@section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <a href="{{route('kategori.create')}}" class="btn btn-sm btn-primary float-right">Tambah Kategori</a>
                </div>

                 <div class="card-body">
                        inventaris olilab
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>nomor</th>
                                    <th>nama barang</th>
                                    <th><center>Aksi</center></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori as $data)
                                @php $no=1; @endphp
                            <tr>
                                <th>{{$no++}}</th>
                                <th>{{$data->nama_barang}}</th>
                                <th>
                                    <form action="{{route('kategori.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('kategori.edit',$data->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('kategori.show',$data->id)}}" class="btn btn-warning">Show</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                    </th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
