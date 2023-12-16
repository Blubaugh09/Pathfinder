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
                console.log('Event diagram node clicked:', data);
                if (myDiagram) {
                    // Save current state before changing view
                    previousState.position = myDiagram.position.copy();
                    previousState.scale = myDiagram.scale;
                    console.log('myDiagram is available');
                    var nodeInMainDiagram = myDiagram.findNodeForKey(data.id);
                    if (nodeInMainDiagram) {
                        console.log('Node found in main diagram:', nodeInMainDiagram);
                        myDiagram.centerRect(nodeInMainDiagram.actualBounds);
                        myDiagram.select(nodeInMainDiagram);
                    } else {
                        console.log('No corresponding node found in main diagram for id:', data.id);
                    }
                } else {
                    console.log('myDiagram is not defined');
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
