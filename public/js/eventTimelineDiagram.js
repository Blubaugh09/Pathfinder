function initEventDiagram() {
    var $ = go.GraphObject.make;
    var eventDiagram = $(go.Diagram, "eventDiagramDiv", {
        "layout": $(go.TreeLayout, {
            angle: 0, // Horizontal layout
            layerSpacing: 100,
            nodeSpacing: 70
        })
    });
 
  
// Assuming you have the eventDiagram, myDiagram, and familyTreeDiagram already set up
eventDiagram.nodeTemplate = $(go.Node, "Auto",
    {
        click: function(e, node) {
            var data = node.part.data;
            console.log("Clicked node data:", data); // Log clicked node data

            if (myDiagram) {
                // Focus on this node in the main diagram
                var nodeInMainDiagram = myDiagram.findNodeForKey(data.id);
                console.log("Node in mainDiagram:", nodeInMainDiagram); // Log node in mainDiagram
               // Access linkDataArray from eventDiagram model
               var links = myDiagram.model.linkDataArray;
               console.log("Link data array from eventDiagram:", links);

                if (nodeInMainDiagram) {
                    myDiagram.centerRect(nodeInMainDiagram.actualBounds);
                    myDiagram.select(nodeInMainDiagram);

                    // Hide all nodes except for the clicked node and its directly connected nodes
                    myDiagram.nodes.each(function(n) {
                        if (n === nodeInMainDiagram || n.findLinksConnected().any(function(l) {
                            return l.getOtherNode(n) === nodeInMainDiagram;
                        })) {
                            n.visible = true;
                        } else {
                            n.visible = false;
                        }
                    });
                }
            }

            // New functionality to highlight link in familyTreeDiagram
        // Highlighting node in familyTreeDiagram with objectType check
        if (familyTreeDiagram) {
            var links = myDiagram.model.linkDataArray;
            var targetNodeId = null;

            // Iterate over links to find a matching 'from' and check 'to' node's objectType
            for (var i = 0; i < links.length; i++) {
                var link = links[i];
                if (link.from === data.id) {
                    var potentialTargetNode = familyTreeDiagram.findNodeForKey(link.to);
                    if (potentialTargetNode && potentialTargetNode.data.objectType === "Person") {
                        targetNodeId = link.to; // Found the correct 'to' node
                        console.log("Matching link found with 'Person' objectType. 'to' id:", targetNodeId);
                        break; // Stop searching once the correct node is found
                    }
                }
            }

            if (targetNodeId) {
                var targetNode = familyTreeDiagram.findNodeForKey(targetNodeId);
                if (targetNode) {
                    // Apply highlighting and focus
                    targetNode.isHighlighted = true;
                    familyTreeDiagram.centerRect(targetNode.actualBounds);
                    familyTreeDiagram.select(targetNode);

                    console.log("Highlighted node in familyTreeDiagram:", targetNode);
                } else {
                    console.log("No node found in familyTreeDiagram with id:", targetNodeId);
                }
            } else {
                console.log("No matching link found in eventDiagram for clicked node id:", data.id);
            }
        }
    }
},
$(go.Shape, "Rectangle", { fill: "white" }),
$(go.TextBlock, { margin: 5 }, new go.Binding("text", "nameAssociated"))
);

// Set up the model for eventDiagram
var eventDataArray = nodeDataArray.filter(function(node) {
    return node.objectType === "Event";
}).sort(function(a, b) {
    return a.eventOrder - b.eventOrder;
});

eventDiagram.model = new go.GraphLinksModel(eventDataArray);
console.log('Event diagram initialized with nodes:', eventDataArray);
}

// Call this function after initializing myDiagram and familyTreeDiagram
initEventDiagram();