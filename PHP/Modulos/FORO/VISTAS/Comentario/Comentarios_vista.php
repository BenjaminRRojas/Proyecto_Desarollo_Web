<section>
    <div class="container-fluid">
        <!-- Iteración de los Comentarios -->
        <?php foreach ($comentarios as $comentario):?>
            <?php if (!isset($comentario->id_comentario_responde)): ?>
                <?php
                    $id_comentario = htmlspecialchars($comentario->id_comentario);
                    $nombres = htmlspecialchars($comentario->nombres);
                    $apellidos = htmlspecialchars($comentario->apellidos);
                    $titulo = htmlspecialchars($comentario->titulo);
                    $fecha = htmlspecialchars($comentario->fecha_comentario);
                    $contenido = htmlspecialchars($comentario->contenido); 
                ?>
            
                <!-- Se despliega un container por comentario con un collapse para responder-->
                <div class="container-fluid bg-light my-3 p-3 border">
                    <div class="d-flex justify-content-between">
                        <h4><?=$nombres?> <?= $apellidos?>: <?=$titulo?></h4>                      
                        <div class="d-flex">
                            <h6><?=$fecha?></h6>
                            <?php if($_SESSION['tipo_usuario'] == "DOCENTE"):?>
                                <button type="button" class="btn-close bg-light ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $id_comentario?>" aria-label="Close"></button>
                                <div class="modal fade" id="exampleModal<?= $id_comentario?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="?c=comentario&a=Borrar&id=<?=$id_comentario?>&id_foro=<?=$this->id_foro?>"><button type="button" class="btn btn-primary">Eliminar</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <p><?=$contenido?></p>
                    <div class="text-end me-2">
                        <button class="btn btn-primary btn-sm text-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRespuesta<?=$id_comentario?>" aria-expanded="false" aria-controls="collapseRespuesta<?=$id_comentario?>">
                            Responder
                        </button>
                    </div>
                    <!--Collapse Respuesta-->
                    <div class="collapse mt-3" id="collapseRespuesta<?=$id_comentario?>">
                        <form class="card card-body" action="?c=comentario&a=Responder" method="POST">
                            <input type="hidden" name="id_comentario" value="<?=$id_comentario?>">
                            <input type="hidden" name="id_foro" value="<?=$this->id_foro?>">
                            
                            <textarea class="form-control mb-3" id="respuesta<?=$id_comentario?>" name="contenido" rows="3" required></textarea>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Enviar respuesta</button>
                            </div>
                        </form>
                    </div>
                    <!-- Se despliega un container con todas las respuestas al comentario principal-->
                    <?php foreach ($comentarios as $respuesta):?>
                        <?php if (isset($respuesta->id_comentario_responde) && $comentario->id_comentario == $respuesta->id_comentario_responde): ?>
                                <?php
                                    $id_respuesta = htmlspecialchars($respuesta->id_comentario);
                                    $nombres = htmlspecialchars($respuesta->nombres);
                                    $apellidos = htmlspecialchars($respuesta->apellidos);
                                    $fecha = htmlspecialchars($respuesta->fecha_comentario);
                                    $contenido = htmlspecialchars($respuesta->contenido); 
                                ?>
                                <div class="container-fluid bg-light my-3 p-3 border col-11">
                                    <div class="d-flex justify-content-between">
                                        <h4><?=$nombres?> <?= $apellidos?>:</h4>
                                        <div class="d-flex">
                                            <h6><?=$fecha ?></h6>
                                            <?php if($_SESSION['tipo_usuario'] == "DOCENTE"):?>
                                                <button type="button" class="btn-close bg-light ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $id_respuesta?>" aria-label="Close"></button>
                                                <div class="modal fade" id="exampleModal<?= $id_respuesta?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <a href="?c=comentario&a=Borrar&id=<?=$id_respuesta?>&id_foro=<?=$this->id_foro?>"><button type="button" class="btn btn-primary">Eliminar</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <p><?=$contenido?></p>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>