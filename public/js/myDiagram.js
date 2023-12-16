

var myDiagram;
       function init() {
    var $ = go.GraphObject.make;
    myDiagram = $(go.Diagram, "mainDiagram", {
        "undoManager.isEnabled": true  // enable undo & redo
    });

   
// Define the template for Nodes
myDiagram.nodeTemplate = $(go.Node, "Auto",
    $(go.Shape, "RoundedRectangle", { fill: "black" }),  // Shape of the node
    $(go.TextBlock, { margin: 10, stroke: "white", font: "bold 14px sans-serif" },
        new go.Binding("text", "nameAssociated")),  // Text block binding
    { // This function is executed when the node is clicked
        click: function(e, obj) {
            var clickedNode = obj.part.data;
            
            // Check if there is location data
            if (clickedNode.locations && clickedNode.locations[0]) {
                var location = clickedNode.locations[0];
                placeMarkerAndPanTo(location, map); // Assume map is your map instance
            }

            // Post interaction to the server
            axios.post('/user-interactions', {
                node_or_link_number: clickedNode.id,
                type: 'node',
                user_id: window.Laravel.userId // Ensure this variable is set correctly
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });

            // Hide all nodes except for the clicked node and its directly connected nodes
            myDiagram.nodes.each(function(n) {
                if (n === obj.part || n.findLinksConnected().any(function(l) {
                    return l.getOtherNode(n) === obj.part;
                })) {
                    n.visible = true;
                } else {
                    n.visible = false;
                }
            });
        }
    }
);



// Define the template for Links
myDiagram.linkTemplate = $(go.Link,
    { 
        // This function is executed when the link is clicked
        click: function(e, obj) {
            var clickedLink = obj.part.data;
            // Now you can send this data to your Laravel backend
            axios.post('/user-interactions', {
                node_or_link_number: clickedLink.id, // Ensure your links have an 'id' property
                type: 'link', // Specify the interaction type as 'link'
                user_id: window.Laravel.userId // Make sure this variable is set as shown previously
            })
            .then(function (response) {
                // Handle the response
                console.log(response);
            })
            .catch(function (error) {
                // Handle any errors
                console.log(error);
            });
        }
    },
    $(go.Shape),  // The link shape
    $(go.Shape, { toArrow: "Standard" })  // The arrowhead
);


    // Create the model for the concept map and assign nodeKeyProperty before assigning the data
    var model = $(go.GraphLinksModel);
    model.nodeKeyProperty = "id";
    model.linkFromKeyProperty = "from";
    model.linkToKeyProperty = "to";
    model.nodeDataArray = nodeDataArray;
    model.linkDataArray = linkDataArray;
    myDiagram.model = model;

  // This function resets the focus to the default view or goes back to the previous state
  function goBack() {
                    // This could be as simple as clearing the selection and zooming out, 
                    // or you might want to store the previous state and revert to that
                    myDiagram.clearSelection();
                    myDiagram.zoomToFit();
                }

}

init();