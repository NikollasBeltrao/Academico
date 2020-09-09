<html>
    <head>
        <meta charset="UTF-8">
            <title></title>
            <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                    <!-- Custom styles for this template-->
                    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
                        <link href="../../css/sb-admin-2.css" rel="stylesheet">

                            </head>
                            <body>            
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-fw fa-exclamation-triangle" style="color: #e9b000 "></i>
                                                    Avisos</h6>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body">
                                                <div id="aviso">     
                                                    <p><strong>Titulo:</strong>Texto do aviso</p> 

                                                </div>                        
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-sticky-note" style="color: #e9b000 "></i>
                                                    Notes</h6>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body" id="quadroAviso">
                                                <div class=" notes">
                                                    <p>
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                                        </svg>
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                        </svg>
                                                    </p>
                                                    <textarea placeholder="Digite aqui..."></textarea> 
                                                </div>
                                            </div>
                                        </div>  

                                    </div>
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                <script>
                                    var Draggable = function (elemento) {
                                        var that = this;
                                        this.elemento = elemento;
                                        this.posX = 0;
                                        this.posY = 0;
                                        this.top = 0;
                                        this.left = 0;
                                        this.refMouseUp = function (event) {
                                            that.onMouseUp(event);
                                        }

                                        this.refMouseMove = function (event) {
                                            that.onMouseMove(event);
                                        }

                                        this.elemento.addEventListener("mousedown", function (event) {
                                            that.onMouseDown(event);
                                        });
                                    }

                                    Draggable.prototype.onMouseDown = function (event) {
                                        this.posX = event.x;
                                        this.posY = event.y;

                                        this.elemento.classList.add("dragging");
                                        window.addEventListener("mousemove", this.refMouseMove);
                                        window.addEventListener("mouseup", this.refMouseUp);
                                    }

                                    Draggable.prototype.onMouseMove = function (event) {
                                        console.log(document.getElementById("quadroAviso").client);
                                        var diffX = event.x - this.posX;
                                        var diffY = event.y - this.posY;
                                        this.elemento.style.top = (this.top + diffY) + "px";
                                        this.elemento.style.left = (this.left + diffX) + "px";
                                    }

                                    Draggable.prototype.onMouseUp = function (event) {
                                        this.top = parseInt(this.elemento.style.top.replace(/\D/g, '')) || 0;
                                        this.left = parseInt(this.elemento.style.left.replace(/\D/g, '')) || 0;
                                        this.posX = event.x;
                                        this.posY = event.y;
                                        this.elemento.classList.remove("dragging");
                                        window.removeEventListener("mousemove", this.refMouseMove);
                                        window.removeEventListener("mouseup", this.refMouseUp);
                                    }

                                    var draggables = document.querySelectorAll(".draggable");
                                    [].forEach.call(draggables, function (draggable, indice) {
                                        new Draggable(draggable);
                                    });
                                </script>
                            </body>
                            </html>
