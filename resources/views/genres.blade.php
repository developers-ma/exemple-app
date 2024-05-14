<x-app-layout>
    <div class="films-content" >

                   <!-- Error message-->
                    @if ($errors->any())
                    <div style="position: relative;display:flex;justify-content:center">

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    </div>

                    @endif
                    <!-- success message-->
                    @if(session('success'))
                        <div style="position: relative;display:flex;justify-content:center">
                        <div class="alert alert-success" style="display: flex; justify-content: center; max-width: 500px;">
                            {{ session('success') }}
                        </div>
                       </div>

                    @endif

                <h1 class="films-page-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: relative;width:50px;margin-right:12px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#475569" d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
                    Les Catégories
                </h1>
        
                <table id="genres-table" class="table-films" style="position: relative; display: inline-grid; justify-content: center;">
                    <thead>
                        <tr>
                            <th>Catégorie id</th>
                            <th>Catégorie name</th>
                        </tr>
                    </thead>
                    <tbody style="position: relative; display: inline-grid; justify-content: center; align-items: center; align-content: space-evenly; justify-items: stretch;">
                        @foreach ($genres as $genre)
                        <tr>
                            <td class="">
                                {{ $genre->genre_id }}  
                            </td>
                            <td class="">
                                {{ $genre->name }} 
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
      var table = $('#genres-table').DataTable({
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
  
      
    var dataTable = $('#genres-table').DataTable();

    // Find the input element within the filter div and set its placeholder attribute
    $('#genres-table_filter input').attr('placeholder', 'Rechercher');

    // Add a search icon before the input element
    $('#genres-table_filter label').prepend('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="position: absolute; width: 20px; margin-left: 12px; margin-top: 8px;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>');

    // Remove the text "Search:" by finding the label element and removing its contents
    $('#genres-table_filter label').contents().filter(function() {
        return this.nodeType === 3; // Node.TEXT_NODE
    }).remove();

    // Append pagination controls to the custom pagination container
    var paginationContainer = document.getElementById('paginationContainer');
  });
  
  </script>
  
</x-app-layout>