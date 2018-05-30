(function() {
    'use strict';
    // Get mouse position
    function getMousePos(c, evt) {
        var rect = c.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    };

    // Write mouse position
    function writeMessage(c, m) {
        var context = c.getContext('2d');
        context.clearRect(0, 0, c.width, c.height);
        context.font = '18pt Calibri';
        context.fillStyle = 'purple';
        context.fillText(m, 10, 25);
    };

    // Make circle
    function makeRect(context, startX,startY,width,height, color, text) {
        context.beginPath();
        context.rect(startX,startY,width,height);
        context.closePath();
        context.stroke();
        context.fillStyle=color;
        context.fill();
        context.fillStyle = "black";
        context.fillText(text,startX,startY-5);
    };

    function makeCircle(context, x, y, color, circleSize) {
        context.beginPath();
        context.arc(x, y, circleSize, 0, Math.PI * 2, true);
        context.fillStyle = color;
        context.fill();
        context.closePath();
    };

    var c = document.getElementById('canvas');
    c.width = "800";
    c.height = "250";
    var context = c.getContext('2d');
    var elements = [];

    elements.push({
        color: 'black',
        startX: 0,
        startY: 20,
        width: 70,
        height: 100,
        text: "3.0",
        clicked: function() {
            alert('no information available');
        }
    },
    {
        color: 'plum',
        startX: 70,
        startY: 20,
        width: 50,
        height: 100,
        text: "3.7",
        clicked: function() {
            var element = document.getElementById("freqInputLower");
            element.value = "3.7";
            var element = document.getElementById("freqInputUpper");
            element.value = "4.2";
            var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('CF - Common Carrier Fixed Point to Point Microwave');
       select.options[select.options.length] = new Option('NN - 3650-3700 MHz');
       select.options[select.options.length] = new Option('MG - Microwave Industrial/Business Pool');
    }
    },
    {
        color: 'black',
        startX: 120,
        startY: 20,
        width: 100,
        height: 100,
        text: "4.2",
        clicked: function() {
            alert('no information available');
        }
    },
    {
        color: 'blue',
        startX: 220,
        startY: 20,
        width: 50,
        height: 100,
        text: "6.0",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 5.925;
            var element = document.getElementById("freqInputUpper");
            element.value = 6.425;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('TP - TV Pickup');
       select.options[select.options.length] = new Option('CT - Local Television Transmission');
       select.options[select.options.length] = new Option('CF - Common Carrier Fixed Point to Point Microwave');
       select.options[select.options.length] = new Option('MG - Microwave Industrial/Business Pool');
       select.options[select.options.length] = new Option('MW - Microwave Public Safety Pool');
    }
    },
    {
        color: 'black',
        startX: 270,
        startY: 20,
        width: 130,
        height: 100,
        text: "7.1",
        clicked: function() {
            alert('No information');
        }
    },
    {
        color: 'orange',
        startX: 400,
        startY: 20,
        width: 100,
        height: 100,
        text: "24.25",
     clicked: function() {
            var element = document.getElementById("freqInputLower");
            element.value = 24.25;
            var element = document.getElementById("freqInputUpper");
            element.value = 24.45;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('TZ - 24 GHz Service');
          select.options[select.options.length] = new Option('RS - Land Mobile Radiolocation');
        }
    },
    {
        color: 'black',
        startX: 500,
        startY: 20,
        width: 30,
        height: 100,
        text: "24.4",
        clicked: function() {
            alert('No information');
        }
    },
    {
        color: 'green',
        startX: 530,
        startY: 20,
        width: 100,
        height: 100,
        text: "24.7",
        clicked: function() {
            var element = document.getElementById("freqInputLower");
            element.value = 24.75;
            var element = document.getElementById("freqInputUpper");
            element.value = 25.25;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('TZ - 24 GHz Service');
    }
    },
     {
        color: 'black',
        startX: 630,
        startY: 20,
        width: 80,
        height: 100,
        text: "25.5",
        clicked: function() {
            alert('no information');
        }
    },
    {
        color: 'green',
        startX: 700,
        startY: 20,
        width: 100,
        height: 100,
        text: "27.5",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 27.5;
            var element = document.getElementById("freqInputUpper");
            element.value = 28.35;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('CF - Common Carrier Fixed Point to Point Microwave');
          select.options[select.options.length] = new Option('LD - Local Multipoint Distribution Service');
    }
    },
    {
        color: 'black',
        startX: 0,
        startY: 140,
        width: 20,
        height: 100,
        text: "30",
        clicked: function() {
            alert('no information');
        }
    },
 {
        color: 'green',
        startX: 20,
        startY: 140,
        width: 80,
        height: 100,
        text: "31.8",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 31.8;
            var element = document.getElementById("freqInputUpper");
            element.value = 33.4;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('RS - Land Mobile Radiolocation');
        }
    },
 {
        color: 'black',
        startX: 100,
    startY: 140,
        width: 100,
        height: 100,
        text: "33.4",
        clicked: function() {
            alert('no information');
        }
    },
 {
        color: 'yellow',
        startX: 200,
        startY: 140,
        width: 50,
        height: 100,
        text: "37",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 37;
            var element = document.getElementById("freqInputUpper");
            element.value = 38.6;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('TP - TV Pickup');
       select.options[select.options.length] = new Option('CT - Local Television Transmission');
       select.options[select.options.length] = new Option('CF - Common Carrier Fixed Point to Point Microwave');
       select.options[select.options.length] = new Option('TN - 39 Ghz, Auctioned');
        }
    },
 {
        color: 'brown',
        startX: 250,
        startY: 140,
        width: 50,
        height: 100,
        text: "38.6",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 38.6;
            var element = document.getElementById("freqInputUpper");
            element.value = 40;
       var select = document.getElementById("Radio_Service");
       select.options.length = 0;
       select.options[select.options.length] = new Option('TP - TV Pickup');
       select.options[select.options.length] = new Option('CT - Local Television Transmission');
       select.options[select.options.length] = new Option('CF - Common Carrier Fixed Point to Point Microwave');
       select.options[select.options.length] = new Option('TN - 39 Ghz, Auctioned');
        }
    },
 {
        color: 'black',
        startX: 300,
    startY: 140,
        width: 70,
        height: 100,
        text: "40",
        clicked: function() {
            alert('no information');
        }
    },
 {
        color: 'plum',
        startX: 370,
        startY: 140,
        width: 30,
        height: 100,
        text: "47.2",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 47.2;
            var element = document.getElementById("freqInputUpper");
            element.value = 48.2;
        }
    },
 {
        color: 'orange',
        startX: 400,
        startY: 140,
        width: 50,
        height: 100,
        text: "48.2",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 48.2;
            var element = document.getElementById("freqInputUpper");
            element.value = 50.2;
        }
    },
 {
        color: 'black',
        startX: 450,
    startY: 140,
        width: 30,
        height: 100,
        text: "50.2",
        clicked: function() {
            alert('no information');
        }
    },
 {
        color: 'blue',
        startX: 480
    ,
        startY: 140,
        width: 20,
        height: 100,
        text: "50.4",
        clicked: function() {
       var element = document.getElementById("freqInputLower");
            element.value = 50.4;
            var element = document.getElementById("freqInputUpper");
            element.value = 50.6;
        }
    }

    );

    elements.forEach(function(element) {
        var rect = new makeRect(context, element.startX, element.startY,element.width,element.height, element.color, element.text);
    });

    canvas.addEventListener('click', function(e) {
        var x = e.pageX - c.offsetLeft;
        var y = e.pageY - c.offsetTop;
        elements.forEach(function(element){
            if(x > element.startX && x < (element.startX + element.width) &&
                     y > element.startY && y < (element.startY+element.height)) {
                element.clicked();
             }
        });
    });
})();
