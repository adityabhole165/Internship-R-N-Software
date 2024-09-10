<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Slider Toggle Button</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Style for the slider toggle */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: #4CAF50;
    }

    input:checked + .slider:before {
      transform: translateX(26px);
    }
  </style>
</head>
<body>
  <div class="container mt-5 text-center">
    <label class="switch">
      <input type="checkbox" id="toggleSwitch">
      <span class="slider"></span>
    </label>
    <p class="mt-3" id="status">Toggle is OFF</p>

    <!-- Placeholder for dynamic content -->
    <div id="menu-items" class="mt-5"></div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleSwitch = document.getElementById('toggleSwitch');
    const statusText = document.getElementById('status');
    const menuItemsDiv = document.getElementById('menu-items');

    toggleSwitch.addEventListener('change', function () {
      if (toggleSwitch.checked) {
        statusText.textContent = 'Toggle is ON';
        loadMenu();  // Call the function to load PHP content
      } else {
        statusText.textContent = 'Toggle is OFF';
        menuItemsDiv.innerHTML = '';  // Clear content when the toggle is off
      }
    });

    function loadMenu() {
      // Use AJAX to load the PHP content from vegapi.php
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'vegapi.php', true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          menuItemsDiv.innerHTML = xhr.responseText;
        } else {
          menuItemsDiv.innerHTML = '<p>Failed to load menu items.</p>';
        }
      };
      xhr.send();
    }
  </script>
</body>
</html>
