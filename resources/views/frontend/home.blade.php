
@extends('layouts.frontend')
@section('content')



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblical Jouneys</title>
    <style>
        .container {
            display: flex;
            gap: 10px;
            padding: 10px;
           
        }

        .column {
            border: 1px solid black;
            padding: 20px;
            position: relative; /* To position the buttons */
            overflow: auto;
            min-height: 100px;
            background-color: lightblue;
            resize: both;
            flex-grow: 1;
            box-sizing: border-box;
            position: relative; /* To position the buttons */
        }

/* Create a new overlay container for the buttons */
.buttons-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex; /* Use flexbox to position button groups */
    justify-content: space-between; /* Adjust as needed */
    pointer-events: none; /* Allows click events to pass through to the columns */
}

/* Position the button groups absolutely */
.buttons {
    position: absolute;
    top: 10px; /* Adjust as needed */
    pointer-events: auto; /* Enables click events on the buttons */
    z-index: 1000; /* Ensure it's above the diagrams */
}

        .button {
            width: 20px;
            height: 20px;
            background-color: #333;
            border: none;
            cursor: pointer;
        }

        #container1 {
            margin-bottom: 10px;
            height: 75vh; 
        }
        #container2 {
           
            height: 25vh; 
        }

        
    </style>
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

</head>

<body>
  <button id="backButton" onclick="goBack()">Back</button>

  <div class="sidebar" id="sidebar">
          <!-- Sidebar content goes here -->
      </div>
  <!-- this is the button that toggles the sidebar -->
  
      <button class="toggle-button" id="toggleButton"></button> 
       
      <div id="container1" class="container">
        
       
        <!-- GoJS diagram columns -->
        <div class="column" style="width:25%;" id="familyTreeDiagramDiv">
            <!-- GoJS diagram will be initialized here -->
        </div>
        <div class="column" style="width:50%;" id="mainDiagram">
            <!-- GoJS diagram will be initialized here -->
        </div>
        <div class="column" style="width:25%;">
            <!-- GoJS diagram will be initialized here -->
        </div>
    </div>

        <div id="container2" class="container">
        <div class="column" style="width:75%;" id="eventDiagramDiv">
          

        </div>
 
         <div class="column" style="width:25%;" id="map">
           
 
        </div>

    </div>

    <script src="{{ asset('js/mapDiagram.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoppsxETyUAT4pYNYgYPZw9qC5qNtOS4s&callback=initMap"></script>
    


        <script src="https://unpkg.com/gojs/release/go.js"></script>
        <script src="{{ asset('bibleNodes/nodes.js') }}"></script>
        <script src="{{ asset('bibleNodes/links.js') }}"></script>
        <script src="{{ asset('js/myDiagram.js') }}"></script>
        <script src="{{ asset('js/eventTimelineDiagram.js') }}"></script>
        <script src="{{ asset('js/familyTreeGenogramDiagram.js') }}"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <!-- Repeat for container2 -->
    <script>
        window.Laravel = {!! json_encode(['userId' => auth()->id()]) !!};
// START back button

 function goBack() {
        if (myDiagram && previousState.position !== null && previousState.scale !== null) {
            // Reset diagram to its previous state
            myDiagram.scale = previousState.scale;
            myDiagram.position = previousState.position;
        }
    }
// END back button

      // STARTresize containers
        function syncHeight(element) {
            const container = element.parentNode;
            let minHeight = element.offsetHeight;

            [...container.children].forEach(child => {
                child.style.height = minHeight + 'px';
            });
        }

        const columns = document.querySelectorAll('.column');
        columns.forEach(column => {
            column.addEventListener('mouseup', function() {
                syncHeight(this);
            });
            column.addEventListener('mousemove', function(e) {
                if (e.buttons) {
                    syncHeight(this);
                }
            });
        });


        // END resize containers

        
    </script>
</body>


@endsection