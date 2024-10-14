<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud Vehicular</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS for styling -->
    <style>
        body {
            background-color: #f3f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 900px;
            padding: 40px;
            margin-top: 40px;
        }

        .form-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
            position: relative;<
        }

        .form-section h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .form-section .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-section label {
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-success {
            margin-bottom: 30px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
        }

        .tooltip-inner {
            background-color: #007bff;
        }

        .form-helper {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .required-mark {
            color: red;
            font-weight: bold;
        }

        .image-header {
            width: 100%;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Responsiveness */
        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="text-center">
            <img src="{{ asset('imag/portada.jpg') }}" alt="Institución" class="image-header img-fluid">
        </div>
    </div>    
    
    
    
    
    @if (session('success'))
    <div class="alert alert-success text-center">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
    </div>
    @endif

    
    <form action="{{ route('solicitud.store') }}" method="POST" enctype="multipart/form-data" class="form-section needs-validation" novalidate>
        @csrf
        <h2>FORMULARIO DE SOLICITUD VEHICULAR</h2>

        <div class="mb-3 position-relative">
            <label for="correo_electronico" class="form-label">Correo electrónico <span class="required-mark">*</span></label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico') }}" required>
            <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="apellido_paterno" class="form-label">Apellido paterno <span class="required-mark">*</span></label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellido_materno" class="form-label">Apellido materno <span class="required-mark">*</span></label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required>
                <div class="invalid-feedback">Este campo es obligatorio.</div>
            </div>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre(s) <span class="required-mark">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono <span class="required-mark">*</span></label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            <div class="form-helper">Ejemplo: +52 123 456 7890</div>
            <div class="invalid-feedback">Por favor, ingresa un número de teléfono válido.</div>
        </div>

        
        <h2>Tipo de Usuario</h2>
        <div class="mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="empleado" name="usuario" value="Empleado" {{ old('usuario') == 'Empleado' ? 'checked' : '' }} required>
                <label class="form-check-label" for="empleado">Empleado</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="alumno" name="usuario" value="Alumno" {{ old('usuario') == 'Alumno' ? 'checked' : '' }} required>
                <label class="form-check-label" for="alumno">Alumno</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="kioskos" name="usuario" value="Kioskos" {{ old('usuario') == 'Kioskos' ? 'checked' : '' }} required>
                <label class="form-check-label" for="kioskos">Kioskos</label>
            </div>
        </div>

        <div id="seccion-alumno" class="mb-3" style="display: none;">
            <label for="numero_control" class="form-label">Número de control (solo para alumnos)</label>
            <input type="text" class="form-control" id="numero_control" name="numero_control" value="{{ old('numero_control') }}">
            <div class="form-helper">Ingresa tu número de matrícula si eres alumno.</div>
        </div>

        
        <h2>Datos Vehiculares</h2>

        
        <div class="mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="bicicleta" name="tipo_vehiculo" value="Bicicleta" {{ old('tipo_vehiculo') == 'Bicicleta' ? 'checked' : '' }} required>
                <label class="form-check-label" for="bicicleta">Bicicleta</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="motocicleta" name="tipo_vehiculo" value="Motocicleta" {{ old('tipo_vehiculo') == 'Motocicleta' ? 'checked' : '' }} required>
                <label class="form-check-label" for="motocicleta">Motocicleta</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="scooter" name="tipo_vehiculo" value="Scooter eléctrico" {{ old('tipo_vehiculo') == 'Scooter eléctrico' ? 'checked' : '' }} required>
                <label class="form-check-label" for="scooter">Scooter eléctrico</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="automovil" name="tipo_vehiculo" value="Automóvil" {{ old('tipo_vehiculo') == 'Automóvil' ? 'checked' : '' }} required>
                <label class="form-check-label" for="automovil">Automóvil</label>
            </div>
        </div>

        
        <div id="seccion-vehiculo" class="mb-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="placa" class="form-label">Placa:</label>
                    <input type="text" class="form-control" id="placa" name="placa" value="{{ old('placa') }}">
                </div>
            </div>

            
            <div class="mb-3">
                <label for="foto_ine_frontal" class="form-label">Fotografía de INE (Frente):</label>
                <input type="file" class="form-control" id="foto_ine_frontal" name="foto_ine_frontal" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="foto_ine_trasera" class="form-label">Fotografía de INE (Trasera):</label>
                <input type="file" class="form-control" id="foto_ine_trasera" name="foto_ine_trasera" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="foto_tarjeta_circulacion" class="form-label">Fotografía de Tarjeta de Circulación:</label>
                <input type="file" class="form-control" id="foto_tarjeta_circulacion" name="foto_tarjeta_circulacion" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="foto_vehiculo" class="form-label">Foto del Vehículo:</label>
                <input type="file" class="form-control" id="foto_vehiculo" name="foto_vehiculo" accept="image/*">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Enviar solicitud</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var usuarioRadios = document.querySelectorAll('input[name="usuario"]');
        var seccionAlumno = document.getElementById('seccion-alumno');
        var tipoVehiculoRadios = document.querySelectorAll('input[name="tipo_vehiculo"]');
        var seccionVehiculo = document.getElementById('seccion-vehiculo');

        usuarioRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.value === 'Alumno') {
                    seccionAlumno.style.display = 'block';
                } else {
                    seccionAlumno.style.display = 'none';
                }
            });
        });

        if (document.querySelector('input[name="usuario"]:checked') && document.querySelector('input[name="usuario"]:checked').value === 'Alumno') {
            seccionAlumno.style.display = 'block';
        }

        tipoVehiculoRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                seccionVehiculo.style.display = 'block';
            });
        });

        if (document.querySelector('input[name="tipo_vehiculo"]:checked')) {
            seccionVehiculo.style.display = 'block';
        }

        
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    });
</script>

</body>
</html>
