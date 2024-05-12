<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Designer</title>
    <!-- Bootstrap CSS -->
    <link href="./resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="./resources/css/main.css" rel="stylesheet">
    <link href="./resources/css/customs.css" rel="stylesheet">
</head>

<body>
    <header class="game-top">
        <div class="container">
            <h1 class="header-title game-header mb-0">Learn to become a<br>
                <span class="locat">GAME DESIGNER</span>
            </h1>
        </div>
    </header>
    <section class="position-relative d-block bg-black">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap pt-4">
                <div class="col-12 col-lg-5">
                    <div class="start-creating">
                        <h2>START CREATING<br class="d-md-block d-none"><span>TODAY!</span></h2>
                    </div>
                    <h2 id="date-now" class="date-now text-center"><?php echo date('d/m/Y') ?></h2>
                </div>
                <div class="col-12 col-lg-7 ps-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <span class="me-2">Start</span>
                            <a class="d-inline-block nav-link disabled active" id="form1-tab" data-toggle="tab" href="#form1" role="tab" aria-controls="form1" aria-selected="true"><b>1</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="d-inline-block nav-link disabled" id="form2-tab" data-toggle="tab" href="#form2" role="tab" aria-controls="form2" aria-selected="false"><b>2</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="d-inline-block nav-link disabled" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false"><b>3</b></a>
                            <span class="ms-2">Finished</span>
                        </li>
                    </ul>
                    <div class="tab-content bg-white p-4" id="myTabContent">
                        <div class="h-100 tab-pane fade show active" id="form1" role="tabpanel" aria-labelledby="form1-tab">
                            <?php include('components/form1.php') ?>
                        </div>
                        <div class="h-100 tab-pane fade" id="form2" role="tabpanel" aria-labelledby="form2-tab">
                            <?php include('components/form2.php') ?>
                        </div>
                        <div class="h-100 tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                            <h4>Congratulations! We’ve found more <b>game design</b> programs
                                Near
                                <b>you</b>
                                that match your preferences. You will be redirected
                                momentarily!
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-black pt-3 mb-0">
        <?php include('components/footer.php'); ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="./resources/js/jquery-3.7.1.min.js"></script>
    <script src="./resources/js/jquery.validate.min.js"></script>
    <script src="./resources/js/additional-methods.min.js"></script>
    <script src="./resources/js/bootstrap.min.js"></script>
    <script>
        // Function to switch to the next tab
        function nextTab(tabId) {
            // console.log($(".nav-item").attr('id'))
            $(tabId).tab('show');
        }

        function getUTMParameters() {
            var urlParams = new URLSearchParams(window.location.search);
            var utmParams = {};
            for (var key of urlParams.keys()) {
                if (key.startsWith("utm_")) {
                    utmParams[key] = urlParams.get(key);
                }
            }
            return utmParams;
        }

        // Handle form submission for form 2
        $('#submit-btn').click(function(e) {
            e.preventDefault();
            $("#form2-data").submit();
        })

        $("#form2-data").validate({
            rules: {
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                address: {
                    required: true
                },
                zip: {
                    required: true,
                    pattern: /^\d{5}$/
                },
                email: {
                    required: true,
                    pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                },
                phone: {
                    required: true,
                    pattern: /^\d{10}$/
                }
                // Add rules for other fields
            },
            messages: {
                firstName: {
                    required: "Please enter first name"
                },
                lastName: {
                    required: "Please enter last name"
                },
                address: {
                    required: "Please enter address"
                },
                zip: {
                    required: "Please enter zip code",
                    pattern: "Please enter a valid zip code"
                },
                email: {
                    required: "Please enter email address",
                    pattern: 'Please enter a valid email address'
                },
                phone: {
                    required: "Please enter phone number",
                    pattern: "Please enter a valid phone number"
                },
                // Add messages for other fields
            },
            errorPlacement: function(error, element) {
                error.addClass('text-danger').insertAfter(element); // Display error message below each input
            },
            submitHandler: function(form) {
                // Form is valid, proceed with submission
                var form1Data = $('#form1-data').serializeArray();
                var form2Data = $('#form2-data').serializeArray();

                // Combine form data
                var combinedData = {}

                form1Data.forEach(function(item) {
                    combinedData[item.name] = item.value;
                });
                form2Data.forEach(function(item) {
                    combinedData[item.name] = item.value;
                });

                combinedData = {
                    ...combinedData,
                    ...getUTMParameters()
                };

                // Post data to webhook
                $.ajax({
                    type: 'POST',
                    url: 'send-data.php',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    data: combinedData,
                    success: function(response) {
                        // Show the third tab upon success
                        nextTab('#completed-tab');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
</body>

</html>