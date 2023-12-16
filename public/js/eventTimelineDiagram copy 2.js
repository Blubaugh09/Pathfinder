function initEventDiagram() {
    var $ = go.GraphObject.make;
    var eventDiagram = $(go.Diagram, "eventDiagramDiv", {
        "layout": $(go.TreeLayout, {
            angle: 0, // Horizontal layout
            layerSpacing: 100,
            nodeSpacing: 70
        })
    });
 
    eventDiagram.nodeTemplate = $(go.Node, "Auto",
    {
        click: function(e, node) {
            var data = node.part.data;
            if (myDiagram) {
                // Focus on this node in the main diagram
                var nodeInMainDiagram = myDiagram.findNodeForKey(data.id);
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
        }
    },
        $(go.Shape, "Rectangle", { fill: "white" }),
        $(go.TextBlock, { margin: 5 }, new go.Binding("text", "nameAssociated"))
    );

    var eventDataArray = nodeDataArray.filter(function(node) {
        return node.objectType === "Event";
    }).sort(function(a, b) {
        return a.eventOrder - b.eventOrder;
    });

    eventDiagram.model = new go.GraphLinksModel(eventDataArray);
    console.log('Event diagram initialized with nodes:', eventDataArray);
}

// Assuming this function is called after myDiagram is initialized in the main code.
initEventDiagram();
