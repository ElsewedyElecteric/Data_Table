<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>test</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- bootstrap5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <!-- bootstrap.css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- exporting library -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <!-- <link rel="stylesheet" href="test.css"> -->
    <link rel="stylesheet" href="pagination.css">
    <link rel="stylesheet" href="../css/main-style.css">
    .
</head>

<body>
    <?php
      // Handle form submission
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $empid = $_POST["empid"];
        $fullName = $_POST["fullName"];
        $department = $_POST["department"];
        $extno = $_POST["extno"];
        $email = $_POST["email"];
      
        // Insert data into the database
        $sql = "INSERT INTO extension (empid, fullName, department, extno, email) VALUES ('$empid', '$fullName', '$department', '$extno', '$email')";
      
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
  
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    
  </div>

  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
</nav>
















    <div class="container-fluid"
      style="background-image: linear-gradient(to bottom, #003168 0%, #002044 100%);
        padding-top: 0px;">
      <div class="container">
        <!-- Circle -->
        <div class="arc-chart">
          <div class="arc-chart__intro" style="padding: 100px 0 50px 0; text-align: center">
            <h2 style="color: #ffc72c !important; margin-bottom: 0px">
              Statistics
            </h2>
            <div class="arc-chart__legend" style="display: flex; justify-content: space-around">
              <div>
                <svg width="48px" height="15px" viewbox="0 0 48 24">
                  <defs>
                    <linearGradient id="Gradient1">
                      <stop class="stop1-gold" offset="0%" />
                      <stop class="stop2-gold" offset="100%" />
                    </linearGradient>

                  
                  </defs>
                  <rect width="48px" height="15px" class="gold-rect" viewbox="0 0 48 24"></rect>
                </svg>
                <span style="color: #ffffff"><b>Male</b></span>
              </div>
              <div>
                <svg width="48px" height="15px" viewbox="0 0 48 24">
                  <defs>
                    <linearGradient id="Gradient2">
                      <stop class="stop1-blue" offset="0%" />
                      <stop class="stop2-blue" offset="100%" />
                    </linearGradient>
                   
                  </defs>
                  <rect width="48px" height="15px" class="blue-rect" viewbox="0 0 48 24"></rect>
                </svg>
                <span style="color: #ffffff"><b>Female</b></span>
              </div>
            </div>
          </div>
          <svg id="arc-chart" class="arc-chart__svg" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="Gradient1">
                <stop class="stop1-gold" offset="0%" />
                <stop class="stop2-gold" offset="100%" />
              </linearGradient>
              <linearGradient id="Gradient2">
                <stop class="stop1-blue" offset="0%" />
                <stop class="stop2-blue" offset="100%" />
              </linearGradient>
            
            </defs>

            <g class="group-arc" id="group-arc__1">
              <path id="gold-rect-stroke" fill="none" stroke-width="15" />
              <path id="blue-rect-stroke" fill="none" stroke-width="15" />
              <text class="rating-text"></text>
              <text class="chart__label">
                Support for developing
                <tspan>a financial plan for clients</tspan>
              </text>
            </g>
            <g class="group-arc" id="group-arc__2">
              <path id="gold-rect-stroke" fill="none" stroke-width="15" />
              <path id="blue-rect-stroke" fill="none" stroke-width="15" />
              <text class="rating-text"></text>
              <text class="chart__label">
                Support for Wills &
                <tspan>estate planning</tspan>
              </text>
            </g>
            <g class="group-arc" id="group-arc__3">
              <path id="gold-rect-stroke" fill="none" stroke-width="15" />
              <path id="blue-rect-stroke" fill="none" stroke-width="15" />
              <text class="rating-text"></text>
              <text class="chart__label">
                Support for
                <tspan>tax planning</tspan>
              </text>
            </g>
            <g class="group-arc" id="group-arc__4">
              <path id="gold-rect-stroke" fill="none" stroke-width="15" />
              <path id="blue-rect-stroke" fill="none" stroke-width="15" />
              <text class="rating-text"></text>
              <text class="chart__label">
                Support for
                <tspan>insurance planning</tspan>
              </text>
            </g>
          </svg>
        </div>
      </div>
    </div>































    <div class="container pt-5" id="container">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <button id="addBtn" class="btn btn-primary">Add Row</button>
                <button id="exportBtn" class="btn btn-success">Export to Excel</button>
                <input id="importBtn" type="file" class="form-control-file d-none">
                <label for="importBtn" class="btn btn-warning m-0">Import from Excel</label>
            </div>
        </div>


        <table id="example" class="table table-striped">
            <thead>
                <!-- fixed table heading -->
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Ext No.</th>
                    <th>Email</th>
                    <th data-sortable="false">Adjust</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <h2 style="margin-top: -15px;">Company Name</h2>
            <p>123 Main Street, Anytown, USA</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@company.com</p>
        </div>
    </footer>



    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/papaparse@5"></script>

    <script>
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}

    $(document).ready(function() {
        var table = $('#example').DataTable({
            paging: true,
            ordering: true,
            searching: true,
            columns: [{
                    data: 'empid'
                },
                {
                    data: 'fullName'
                },
                {
                    data: 'department'
                },
                {
                    data: 'extno'
                },
                {
                    data: 'email'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<button class="btn btn-sm btn-primary editBtn">Edit</button> ' +
                            '<button class="btn btn-sm btn-danger deleteBtn">Delete</button>';
                    }
                }
            ]
        });

        // Add row button
        $('#addBtn').click(function() {
            var rowNode = table.row.add({
                empid: '',
                fullName: '',
                department: '',
                extno: '',
                email: '',
                actions: '<button class="btn btn-sm btn-primary saveBtn">Save</button> ' +
                    '<button class="btn btn-sm btn-secondary cancelBtn">Cancel</button>'
            }).draw().node();

            // Set focus on the first input element in the new row
            $(rowNode).find('td:first-child').children().focus();
        });

        // Edit row button
        $('#example').on('click', '.editBtn', function() {
            var data = table.row($(this).parents('tr')).data();





            // Replace the row's cells with input fields
            // has an error when you click on edit button (undefined) word located inside the textfield
            table.row($(this).parents('tr')).nodes().to$()
                .find('td:not(:last-child)')
                .each(function(index) {
                    $(this).html('<input type="text" class="form-control" value="' + data[index] +
                        '">');
                });

            // Change the button to a save button
            $(this).removeClass('btn-primary editBtn').addClass('btn-success saveBtn').html('Save');
        });

        // Save row button
        $('#example').on('click', '.saveBtn', function() {
            var $row = $(this).closest('tr');
            var data = table.row($row).data();


            // Update the row's data with the new input values
            table.row($row).data({
                empid: $row.find('td:eq(0) input').val(),
                fullName: $row.find('td:eq(1) input').val(),
                department: $row.find('td:eq(2) input').val(),
                extno: $row.find('td:eq(3) input').val(),
                email: $row.find('td:eq(4) input').val()
            });

            // Change the save button back to an edit button
            $(this).removeClass('btn-success saveBtn').addClass('btn-primary editBtn').html('Edit');
        });


        // Delete row button
        $('#example').on('click', '.deleteBtn', function() {
            var $row = $(this).closest('tr');

            // Show a confirmation dialog before deleting the row
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this row!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    table.row($row).remove().draw();
                    Swal.fire(
                        'Deleted!',
                        'The row has been deleted.',
                        'success'
                    )
                }
            });
        });



















        // Export to Excel button
        $('#exportBtn').click(function() {
            var wb = XLSX.utils.table_to_book(document.getElementById('example'), {
                sheet: 'Sheet JS'
            });
            return XLSX.writeFile(wb, 'extension.xlsx');
        });

        // Import from Excel button
        $('#importBtn').change(function() {
            var files = $(this).prop('files');

            if (files.length > 0) {
                var file = files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });

                    // Get the first sheet
                    var sheet_name_list = workbook.SheetNames;
                    var sheet_name = sheet_name_list[0];
                    var worksheet = workbook.Sheets[sheet_name];

                    // Convert the sheet to a 2D array
                    var arr = XLSX.utils.sheet_to_json(worksheet, {
                        header: 1
                    });

                    // Remove the header row
                    arr.shift();

                    // Add the rows to the table
                    table.rows.add(arr).draw();
                };

                reader.onerror = function() {
                    alert('Unable to read ' + file.fileName);
                };

                reader.readAsBinaryString(file);
            }
        });
    });






    /* --- Constants -- */
const ratings = [
  { us: 9.5, others: 8.3 },
  { us: 9.0, others: 8.4 },
  { us: 8.8, others: 8 },
  { us: 9.2, others: 8.5 },
];
const gapBetweenArcGroup = 50;
const arcGroups = document.querySelectorAll('.group-arc');
let start, previousTimeStamp, counter;
counter = 1;
let mobileViewModeOn;

/* --- Set Viewbox size for mobile -- */
const setViewboxSizeMobile = (mobileViewModeOn) => {
  const SVG_EL = document.getElementById('arc-chart');
  if (mobileViewModeOn) {
    SVG_EL.setAttribute('viewBox', '0 0 400 1200');
    // SVG_EL.setAttribute('height', '1200px');
  } else {
    SVG_EL.setAttribute('viewBox', '0 0 1200 400');
    // SVG_EL.setAttribute('width', '1200px');
  }
};

/* --- Set Intersection Observer -- */
const setIntersectionObserver = () => {
  /* --- Utils -- */
  const generateObserverOptions = (threshold) => {
    return (observerOptions = {
      threshold: mobileViewModeOn === true ? 0.25 : 1,
    });
  };

  /* --- Main -- */
  const generateAndAnimateArcs = (entries) => {
    entries.forEach((entrie) => {
      if (entrie.isIntersecting) {
        generateArc(mobileViewModeOn);
        setTimeout(() => {
          window.requestAnimationFrame(animateArcs);
        }, 1500);
      }
    });
  };
  const target = document.getElementById('arc-chart');
  const observer = new IntersectionObserver(generateAndAnimateArcs, generateObserverOptions());
  observer.observe(target);
};

/* --- Generate Arcs -- */
const generateArc = () => {
  /* --- Utils -- */
  const polarToCartesian = (centerX, centerY, radius, angleInDegrees) => {
    var angleInRadians = ((angleInDegrees - 90) * Math.PI) / 180.0;

    return {
      x: centerX + radius * Math.cos(angleInRadians),
      y: centerY + radius * Math.sin(angleInRadians),
    };
  };
  const describeArc = (options) => {
    var start = polarToCartesian(options.x, options.y, options.radius, options.endAngle);
    var end = polarToCartesian(options.x, options.y, options.radius, options.startAngle);

    var largeArcFlag = options.endAngle - options.startAngle <= 180 ? '0' : '1';

    var d = [
      'M',
      start.x,
      start.y,
      'A',
      options.radius,
      options.radius,
      0,
      largeArcFlag,
      0,
      end.x,
      end.y,
    ].join(' ');

    return d;
  };
  const generateDescribeArcOptions = (groupIndex, childIndex) => {
    let endAngle;
    let radius;
    if (childIndex === 0) {
       let rating = ratings[groupIndex].us / 10;
      endAngle = 360 + 360 * rating;
      radius = 115;
    } else {
      let rating = ratings[groupIndex].others / 10;
      endAngle = 360 + 360 * rating;
      radius = 90;
    }

    let x, y;
    if (mobileViewModeOn) {
      x = 150;
      y = 250 * (groupIndex + 1) + gapBetweenArcGroup * groupIndex - 100;
    } else {
      x = 250 * (groupIndex + 1) + gapBetweenArcGroup * groupIndex - 100;
      y = 150;
    }

    return {
      x,
      y,
      radius: radius,
      endAngle: endAngle,
      startAngle: 360,
    };
  };

  for (let [groupIndex, groupNode] of arcGroups.entries()) {
    for (let childIndex = 0; childIndex < 2; childIndex++) {
      let options = generateDescribeArcOptions(groupIndex, childIndex);
      groupNode.children[childIndex].setAttribute('d', `${describeArc(options)}`);
      groupNode.children[childIndex].classList.add('animate-path');
      if (childIndex === 1) {
        groupNode.children[childIndex + 1].setAttribute('x', options.x - 30);
        groupNode.children[childIndex + 1].setAttribute('y', options.y + 18);

        if (groupIndex === 1) {
          groupNode.children[childIndex + 2].setAttribute('x', options.x - 65);
          groupNode.children[childIndex + 2].setAttribute('y', options.y + 160);
          groupNode.children[childIndex + 2].children[0].setAttribute('x', options.x - 55);
          groupNode.children[childIndex + 2].children[0].setAttribute('dy', 25);
        } else if (groupIndex === 2) {
          groupNode.children[childIndex + 2].setAttribute('x', options.x - 50);
          groupNode.children[childIndex + 2].setAttribute('y', options.y + 160);
          groupNode.children[childIndex + 2].children[0].setAttribute('x', options.x - 55);
          groupNode.children[childIndex + 2].children[0].setAttribute('dy', 25);
        } else if (groupIndex === 3) {
          groupNode.children[childIndex + 2].setAttribute('x', options.x - 50);
          groupNode.children[childIndex + 2].setAttribute('y', options.y + 160);
          groupNode.children[childIndex + 2].children[0].setAttribute('x', options.x - 75);
          groupNode.children[childIndex + 2].children[0].setAttribute('dy', 25);
        } else {
          groupNode.children[childIndex + 2].setAttribute('x', options.x - 100);
          groupNode.children[childIndex + 2].setAttribute('y', options.y + 160);
          groupNode.children[childIndex + 2].children[0].setAttribute('x', options.x - 100);
          groupNode.children[childIndex + 2].children[0].setAttribute('dy', 25);
        }
      }
    }
  }
};

const animateArcs = (timestamp) => {
  const textElements = document.querySelectorAll('.rating-text');
  if (start === undefined) start = timestamp;
  const elapsed = timestamp - start;

  if (previousTimeStamp !== timestamp) {
    for (let [index, rate] of ratings.entries()) {
      const count = Math.min(0.1 * counter, rate.us);

      textElements[index].innerHTML = count.toFixed(1);
    }
  }

  if (elapsed < 5000) {
    // Stop the animation after 2 seconds
    previousTimeStamp = timestamp;
    counter++;
    window.requestAnimationFrame(animateArcs);
  }
};
/* --- Initialize  -- */

const init = () => {
  /* --- Check Viewport Size -- */
  const isMobile = () => {
    let viewWidth = window.visualViewport.width;
    return viewWidth <= 600 ? true : false;
  };
  mobileViewModeOn = isMobile();
  setViewboxSizeMobile(mobileViewModeOn);
  setIntersectionObserver(mobileViewModeOn);
};

init();

    </script>
    <script src="test.js">
    < /body> <
    /html>