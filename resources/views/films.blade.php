<x-app-layout>
    <div class="films-content" >
        
                <table id="films-table" class="table-films" style="position: relative; display: inline-grid; justify-content: center;">
                    <thead style="display: none;">
                        <tr>
                            <th>Film</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)
                        <tr>
                            <td class="film-frame">
                                <div style="position: relative;display: flex;margin:20px;width;100%;flex-wrap: wrap;justify-content: center;">
                                <div class="square-crop">
                                <img src="{{ $film->image_url }}" alt="{{ $film->title }}">
                                </div>
                                <div style="position: relative; margin: 14px;">
                                    <h1 class="films-title">{{ $film->title }}</h1>
                                    <button class="simple-btn">{{__("supprimer")}}</button>
                                </div>
                                </div>

                                
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
   
            
                <div id="paginationContainer"></div>



    </div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize DataTable
      var table = $('#films-table').DataTable({
          // Hide search input and show entries dropdown
          lengthChange: false,
          pageLength: 6, // Adjust this number as needed
          order: [[0, 'desc']], // Assuming ID is in the first column, change 'asc' to 'desc' if you want to order by ID last
  
          language: {
              // Set custom language options
              paginate: {
                  previous: '@lang("pagination.previous")', // Laravel custom translation for "Previous"
                  next: '@lang("pagination.next")' // Laravel custom translation for "Next"
              }
          }
      });
  
      // Handle form submission
      var forms = document.querySelectorAll('.form-index');
      forms.forEach(function (form) {
          form.addEventListener('submit', function (e) {
              e.preventDefault(); // Prevent the default form submission
              performSearch();
          });
      });
  
      // Handle keyup and change events on input fields
      var inputs = document.querySelectorAll('.form-index input');
      inputs.forEach(function (input) {
          input.addEventListener('keyup', function () {
              performSearch();
          });
          input.addEventListener('change', function () {
              performSearch();
          });
      });
  
      function performSearch() {
          var idCard = document.querySelector('input[name="id_card"]').value.trim();
          var fullName = document.querySelector('input[name="full_name"]').value.trim();
          var phone = document.querySelector('input[name="phone"]').value.trim();
          var dob = document.querySelector('input[name="dob"]').value.trim();
  
          // Apply search to DataTable columns
          table.columns([1, 2, 3, 4]).search('').draw(); // Reset previous search
  
          if (idCard) {
              table.column(1).search(idCard).draw();
          }
          if (fullName) {
              table.column(2).search(fullName).draw();
          }
          if (phone) {
              table.column(3).search(phone).draw();
          }
          if (dob) {
              table.column(4).search(dob).draw();
          }
      }
  
      // Append pagination controls to the custom pagination container
      var paginationContainer = document.getElementById('paginationContainer');
      paginationContainer.appendChild(document.getElementById('patients_paginate'));
  });
  
  </script>
</x-app-layout>