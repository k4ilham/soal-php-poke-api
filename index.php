<!DOCTYPE html>
<html>
<head>
  <title>Dropdown Select2 dengan Data dari PokeAPI</title>
  <!-- Menggunakan CDN untuk file CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Menggunakan CDN untuk file CSS Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Pilih Ability Pokemon:</h1>
  
    <select id="abilitiesDropdown" class="form-select mt-3"></select>
  </div>

  <!-- Menggunakan CDN untuk file JavaScript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Menggunakan CDN untuk file JavaScript Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>

$(document).ready(function() {
  // Inisialisasi Select2 pada dropdown
  $('#abilitiesDropdown').select2();

  // Panggil API dan isi data ke dalam dropdown
  $.ajax({
    url: 'https://pokeapi.co/api/v2/ability?limit=20&offset=20',
    method: 'GET',
    dataType: 'json',
    success: function(response) {
      var abilities = response.results;

      // Urutkan data abilities secara ascending berdasarkan nama
      abilities.sort(function(a, b) {
        var nameA = a.name.toUpperCase();
        var nameB = b.name.toUpperCase();
        if (nameA < nameB) {
          return -1;
        }
        if (nameA > nameB) {
          return 1;
        }
        return 0;
      });

      // Iterasi data abilities dan tambahkan sebagai option pada dropdown
      abilities.forEach(function(ability) {
        var option = new Option(ability.name, ability.url);
        $('#abilitiesDropdown').append(option);
      });

      // Refresh tampilan Select2 setelah data ditambahkan
      $('#abilitiesDropdown').trigger('change');
    }
  });
});
  </script>
</body>
</html>
