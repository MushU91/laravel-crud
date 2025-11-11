<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cities and Townships</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #f8fafc;
      padding: 30px;
      text-align: center
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #1d4ed8;
    }

    .city-container {
      position: relative; /* parent for dropdown */
      display: inline-block;
      margin: 10px;
    }

    button {
      background-color: #2563eb;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #1e40af;
    }

    ul {
      position: absolute; /* fixed position under button */
      top: 110%;           /* appear just below button */
      left: 0;
      background: white;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 10px;
      margin: 0;
      list-style-type: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      display: none; /* hidden by default */
      z-index: 100;
      min-width: 180px;
    }

    li {
      padding: 5px 10px;
      color: #334155;
    }

    li:hover {
      background-color: #f1f5f9;
    }
  </style>
</head>
<body>

  <h2>City and Township List</h2>

  @foreach($cities as $city)
    <div class="city-container">
      <button onclick="toggleTownships({{ $city->id }})">
        {{ $city->name }}
      </button>

      <ul id="city-{{ $city->id }}">
        @foreach($cityTownships->where('city_id', $city->id) as $township)
          <li>{{ $township->township_name }}</li>
        @endforeach
      </ul>
    </div>
  @endforeach

  <script>
    function toggleTownships(cityId) {
      // Hide all township lists first
      document.querySelectorAll('ul').forEach(ul => ul.style.display = 'none');

      // Then show only the clicked one
      const target = document.getElementById('city-' + cityId);
      target.style.display = (target.style.display === 'block') ? 'none' : 'block';
    }

    // Optional: Close dropdown if click outside
    document.addEventListener('click', function(e) {
      const isButton = e.target.tagName === 'BUTTON';
      if (!isButton) {
        document.querySelectorAll('ul').forEach(ul => ul.style.display = 'none');
      }
    });
  </script>

</body>
</html>
