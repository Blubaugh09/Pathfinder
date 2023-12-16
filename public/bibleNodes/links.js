// create the model for the concept map
var linkDataArray = [
    // Linking Jesus to Israel
    {
        id:1,
        to: 1, // Jesus Christ
        from: 2, // Israel
        verseAssociated: ["Matthew 2:19-21"],
        weight: "major",
        relationshipType: "birthLocation",
        clusterType: "locations",
        dateAssociated: "Around 4 BC",
        linkTheme: "birth",
        nameAssociated: "Birthplace of Jesus",
        expandable: false,
        visibility: "default",
        eventOrder: 1,
        linkDescription: "Jesus Christ was born in Bethlehem, which is located in Israel.",
        diagramType: ["eventFlow", "mapView"]
    },
    // Linking Jesus to the Cross
    {
        id:2,
        to: 1, // Jesus Christ
        from: 4, // The Cross
        verseAssociated: ["John 19:17-30"],
        weight: "major",
        relationshipType: "crucifixion",
        clusterType: "events",
        dateAssociated: "Around AD 30",
        linkTheme: "sacrifice",
        nameAssociated: "Crucifixion of Jesus",
        expandable: false,
        visibility: "default",
        eventOrder: 2,
        linkDescription: "Jesus Christ was crucified on the Cross, an event central to Christian belief.",
        diagramType: ["eventFlow", "symbolView"]
    },
    // Linking Birth of Jesus to Israel
    { 
        id:3,
        to: 3, // Birth of Jesus
        from: 2, // Israel
        verseAssociated: ["Luke 2:1-20"],
        weight: "major",
        relationshipType: "eventLocation",
        clusterType: "locations",
        dateAssociated: "Around 4 BC",
        linkTheme: "birth",
        nameAssociated: "Nativity location",
        expandable: false,
        visibility: "default",
        eventOrder: 3,
        linkDescription: "The event of Jesus' birth took place in Bethlehem, a city in Israel.",
        diagramType: ["eventFlow", "mapView"]
    },
    // Linking Jesus to the event of his Birth
    {
        id:4,
        to: 2, // Jesus Christ
        from: 3, // Birth of Jesus
        verseAssociated: ["Luke 2:1-20"],
        weight: "major",
        relationshipType: "centralFigure",
        clusterType: "events",
        dateAssociated: "Around 4 BC",
        linkTheme: "birth",
        nameAssociated: "Birth of Jesus",
        expandable: false,
        visibility: "default",
        eventOrder: 4,
        linkDescription: "Jesus Christ is the central figure in the event of the Nativity.",
        diagramType: ["eventFlow", "familyTree"]
    },
    {
        id:5,
        to: 1, // Jesus Christ
        from: 3, // Birth of Jesus
        verseAssociated: ["Luke 2:1-20"],
        weight: "major",
        relationshipType: "centralFigure",
        clusterType: "events",
        dateAssociated: "Around 4 BC",
        linkTheme: "birth",
        nameAssociated: "Birth of Jesus",
        expandable: false,
        visibility: "default",
        eventOrder: 4,
        linkDescription: "Jesus Christ is the central figure in the event of the Nativity.",
        diagramType: ["eventFlow", "familyTree"]
    }
];

 
  
  
