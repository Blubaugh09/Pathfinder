// create the model for the concept map
var nodeDataArray = [
  
    // Person
    {
        id: 1,
        objectType: "Person",
        n: "Jesus", s: "M",
        locations: [{ latitude: 31.7683, longitude: 35.2137 }], // Approximate location for Jerusalem
        dateExisted: "4 BC - AD 30",
        eventThemeType: "salvation",
        eventOrder: 1,
        bibleVerses: ["Matthew 1:1-25", "John 3:16"],
        booksOfBibleIn: ["Matthew", "John"],
        weight: "major",
        nameAssociated: "Jesus Christ",
        expandable: true,
        visibility: "default",
        imageURL: "/images/jesus.png",
        tagsCategories: ["Messiah", "Savior", "Son of God"],
        notes: "Central figure of Christianity",
        crossReferences: ["Isaiah 7:14", "Micah 5:2"],
        nodeDescription: "Jesus of Nazareth, central figure of Christianity, believed to be the Son of God.",
        diagramType: ["familyTree", "eventFlow"]
    },
    // Place
    {
        id: 2,
        objectType: "Place",
        locations: [{ latitude: 31.0461, longitude: 34.8516 }], // Approximate location for Israel
        dateExisted: "Biblical times - present",
        eventThemeType: "history",
        eventOrder: 2,
        bibleVerses: ["Genesis 12:1-9"],
        booksOfBibleIn: ["Genesis"],
        weight: "major",
        nameAssociated: "Israel",
        expandable: true,
        visibility: "default",
        imageURL: "/images/israel.png",
        tagsCategories: ["Holy Land", "Promised Land"],
        notes: "Land given by God to the descendants of Abraham",
        crossReferences: ["Exodus 3:8", "Joshua 1:4"],
        nodeDescription: "Israel, the land promised by God to Abraham and his descendants.",
        diagramType: ["mapView"]
    },
    // Event 
    {
        id: 3,
        objectType: "Event",
        locations: [{ latitude: 31.7767, longitude: 35.2345 }], // Approximate location for Bethlehem
        dateExisted: "Around 4 BC",
        eventThemeType: "birth",
        eventOrder: 3,
        bibleVerses: ["Luke 2:1-20"],
        booksOfBibleIn: ["Luke"],
        weight: "major",
        nameAssociated: "Birth of Jesus",
        expandable: true,
        visibility: "default",
        imageURL: "/images/nativity.png",
        tagsCategories: ["Nativity", "Christmas"],
        notes: "Birth of Jesus Christ, celebrated as Christmas",
        crossReferences: ["Isaiah 9:6", "Micah 5:2"],
        nodeDescription: "The birth of Jesus Christ in Bethlehem, a foundational event in Christianity.",
        diagramType: ["eventFlow", "timeline"]
    },
    // Object
    {
        id: 4,
        objectType: "Object",
        locations: [], // No specific location
        dateExisted: "Time of Jesus",
        eventThemeType: "crucifixion",
        eventOrder: 4,
        bibleVerses: ["John 19:17-30"],
        booksOfBibleIn: ["John"],
        weight: "major",
        nameAssociated: "The Cross",
        expandable: false,
        visibility: "default",
        imageURL: "/images/cross.png",
        tagsCategories: ["Crucifixion", "Salvation"],
        notes: "Symbol of Christ's sacrifice",
        crossReferences: ["1 Corinthians 1:18", "Galatians 6:14"],
        nodeDescription: "The cross on which Jesus was crucified, a symbol of sacrifice and redemption.",
        diagramType: ["symbolView"]
    },
    {
        id: 5,
        objectType: "Person",
        n: "Adam", s: "M",
        locations: [{ latitude: 31.7683, longitude: 35.2137 }], // Approximate location for Jerusalem
        dateExisted: "3000 BC",
        eventThemeType: "first human",
        eventOrder: 1,
        bibleVerses: [""],
        booksOfBibleIn: [""],
        weight: "major",
        nameAssociated: "Adam",
        ux: 6, // ID of Eve for linking to her in the family genogram tree. ux is wife
        expandable: true,
        visibility: "default",
        imageURL: "",
        tagsCategories: [""],
        notes: "",
        crossReferences: [""],
        nodeDescription: "",
        diagramType: ["familyTree", "eventFlow"]
    },
    {
        id: 6,
        objectType: "Person",
        n: "Eve", s: "F", vir: 5,
        locations: [{ latitude: 31.7683, longitude: 35.2137 }], // Approximate location for Jerusalem
        dateExisted: "3000 BC",
        eventThemeType: "first woman",
        eventOrder: 1,
        bibleVerses: [""],
        booksOfBibleIn: [""],
        weight: "major",
        nameAssociated: "Eve",
        vir: 5, // ID of Adam for linking to him in the family genogram tree. vir is husband
        expandable: true,
        visibility: "default",
        imageURL: "",
        tagsCategories: [""],
        notes: "",
        crossReferences: [""],
        nodeDescription: "",
        diagramType: ["familyTree", "eventFlow"]
    },
    {
        id: 7,
        objectType: "Person",
        n: "Cain", s: "M", m: 6, f: 5,
        locations: [{ latitude: 31.7683, longitude: 35.2137 }], // Approximate location for Jerusalem
        dateExisted: "3000 BC",
        eventThemeType: "murder",
        eventOrder: 1,
        bibleVerses: [""],
        booksOfBibleIn: [""],
        weight: "major",
        nameAssociated: "Cain",
        m: 6, // ID of Eve for the family genogram tree
        f: 5, // ID of Adam for the family genogram tree
        expandable: true,
        visibility: "default",
        imageURL: "/images/jesus.png",
        tagsCategories: [""],
        notes: "",
        crossReferences: [""],
        nodeDescription: "",
        diagramType: ["familyTree", "eventFlow"]
    },
    {
        id: 8,
        objectType: "Person",
        n: "Abel", s: "M", m: 6, f: 5,
        locations: [{ latitude: 31.7683, longitude: 35.2137 }], // Approximate location for Jerusalem
        dateExisted: "3000 BC",
        eventThemeType: "",
        eventOrder: 2,
        bibleVerses: ["Genesis 4:1-16"],
        booksOfBibleIn: ["Genesis"],
        weight: "major",
        nameAssociated: "Abel",
        m: 6, // ID of Eve for the family genogram tree
        f: 5, // ID of Adam for the family genogram tree
        expandable: false,
        visibility: "default",
        imageURL: "/images/jesus.png",
        tagsCategories: ["First human death", "Son of Adam and Eve"],
        notes: "",
        crossReferences: ["Isaiah 7:14", "Micah 5:2"],
        nodeDescription: "",
        diagramType: ["familyTree", "eventFlow"]
    },
   
];

  
