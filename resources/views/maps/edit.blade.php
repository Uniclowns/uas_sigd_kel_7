<!DOCTYPE html>
<html>
  <title>Edit Lokasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<head>
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        h2{
          text-align:center;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            margin-left:10px;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* input[type=delete] {
            margin-right:20px;
            background-color: #04AA6D;
            color: white;
            padding: 12px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=delete]:hover {
            background-color: #45a049;
        } */

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 50px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        .button-container{
          text-align:center;
          justify-content:center;
          display:flex;
          margin: 10px;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
          input[type=delete] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <h2>Edit Data Peta</h2>

    <div class="container">
        @if ($peta)
            <form action="{{ route('update', $peta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-25">
                        <label for="name">Nama Tempat</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama" name="name"
                            value="{{ isset($peta->name) ? $peta->name : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Asal">Asal</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="asal" name="asal"
                            value="{{ isset($peta->asal) ? $peta->asal : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Latitude">Latitude</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="latitude" name="latitude"
                            value="{{ isset($peta->latitude) ? $peta->latitude : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Longitude">Longitude</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="longitude" name="longitude"
                            value="{{ isset($peta->longitude) ? $peta->longitude : '' }}">
                    </div>
                </div>
                <br>
                <div class="button-container">
                    <button type="submit" class="btn btn-success"> Update</button>
                </div>
                <div class="button-container">
                    <a class="btn btn-md btn-danger" href="{{ route('maps.index') }}">Batal</a>
                </div>
            </form>
            <form action="{{ route('delete', $peta->id) }}" method="POST"
                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');">
                @csrf
                @method('DELETE')
              <div class="button-delete" style="display:flex; float:right">
                    <button type="submit" class="btn btn-warning"> Hapus</button>

              </div>
            </form>
        @else
            <p>Lokasi tidak ditemukan</p>
        @endif
    </div>

</body>

</html>
