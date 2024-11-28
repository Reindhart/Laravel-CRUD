<section class="container my-5">
    <div class="mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-user-plus"></i> Nuevo Cliente
        </button>
    </div>
    <table class="table table-hover my-auto">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id_c }}</th>
                    <td>{{ $cliente->nombre_c }}</td>
                    <td>{{ $cliente->correo_c }}</td>
                    <td>{{ $cliente->telefono_c }}</td>
                    <td>{{ $cliente->direccion_c }}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#editar{{ $cliente->id_c }}">
                            <i class="fas fa-user-edit"></i>
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#eliminar{{ $cliente->id_c }}">
                            <i class="fas fa-user-slash"></i>
                        </button>
                    </td>
                </tr>

                <!--  EDITAR  -->
                <div class="modal fade" id="editar{{ $cliente->id_c }}" data-backdrop="static" data-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('cliente.update', $cliente->id_c) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id_c" value="{{ $cliente->id_c }}" />
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre_c">Nombre: </label>
                                        <input type="text" name="nombre_c" value="{{ $cliente->nombre_c }}"
                                            class="form-control" placeholder="Ingrese su nombre" required />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="correo_c">Correo: </label>
                                            <input type="email" name="correo_c" value="{{ $cliente->correo_c }}"
                                                class="form-control" placeholder="Correo electrónico" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telefono_c">Teléfono: </label>
                                            <input type="number" name="telefono_c" value="{{ $cliente->telefono_c }}"
                                                class="form-control" placeholder="Número telefónico" min="1"
                                                max="9999999999" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Dirección: </label>
                                        <textarea class="form-control" name="direccion_c" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Ingrese la dirección">{{ $cliente->direccion_c }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--  ELIMINAR  -->
                <div class="modal fade" id="eliminar{{ $cliente->id_c }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenter">Eliminar</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/dCliente" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_c" value="{{ $cliente->id_c }}" />
                                <div class="modal-body">
                                    <p>¿Realmente deseas eliminar a {{ $cliente->nombre_c }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-window-close"></i> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--  AGREGAR  -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/iClientes" method="POST">
                            @csrf <!-- Aquí se agrega el token CSRF -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Nuevo cliente
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre_c">Nombre: </label>
                                    <input type="text" name="nombre_c" class="form-control"
                                        placeholder="Ingrese su nombre" required />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="correo_c">Correo: </label>
                                        <input type="email" name="correo_c" class="form-control"
                                            placeholder="Correo electrónico" required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="clave_c">Contraseña:</label>
                                        <input type="password" name="clave_c" class="form-control"
                                            placeholder="Ingrese una contraseña" required />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telefono_c">Teléfono: </label>
                                        <input type="number" name="telefono_c" class="form-control"
                                            placeholder="Número telefónico" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="direccion_c">Dirección:</label>
                                        <input type="text" name="direccion_c" class="form-control"
                                            placeholder="Dirección" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-address-card"></i> Agregar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </tbody>
    </table>
</section>
<br />
