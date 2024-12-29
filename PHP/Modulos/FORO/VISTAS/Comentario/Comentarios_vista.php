<section>
    <div class="container-fluid">
        <!-- Iteración de los Comentarios -->
        <?php foreach ($comentarios as $comentario):?>
            <?php if (!isset($comentario->id_comentario_responde)): ?>
                <?php
                    $id_comentario = htmlspecialchars($comentario->id_comentario);
                    $titulo = htmlspecialchars($comentario->titulo);
                    $fecha = htmlspecialchars($comentario->fecha_comentario);
                    $contenido = htmlspecialchars($comentario->contenido); 
                ?>
            
                <!-- Se despliega un container por comentario con un collapse para responder-->
                <div class="container-fluid bg-light my-3 p-3 border">
                    <div class="d-flex justify-content-between">
                        <h2><?=$titulo?></h2>
                        <h6><?=$fecha?></h6>
                    </div>
                    <p><?=$contenido?></p>
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRespuesta<?=$id_comentario?>" aria-expanded="false" aria-controls="collapseRespuesta<?=$id_comentario?>">
                        Responder
                    </button>
                    <!--Collapse Respuesta-->
                    <div class="collapse mt-3" id="collapseRespuesta<?=$id_comentario?>">
                        <form class="card card-body" action="?c=comentario&a=Responder" method="POST">
                            <p><?=$this->id_foro?></p>
                            <input type="hidden" name="id_comentario" value="<?=$id_comentario?>">
                            <input type="hidden" name="id_foro" value="<?=$this->id_foro?>">
                            
                            <textarea class="form-control mb-3" id="respuesta<?=$id_comentario?>" name="contenido" rows="3" required></textarea>
                            <div>
                                <button type="submit" class="btn btn-success col-6">Enviar respuesta</button>
                            </div>
                        </form>
                    </div>
                    <!-- Se despliega un container con todas las respuestas al comentario principal-->
                    <?php foreach ($comentarios as $respuesta):?>
                        <?php if (isset($respuesta->id_comentario_responde) && $comentario->id_comentario == $respuesta->id_comentario_responde): ?>
                                <?php
                                    $id_respuesta = htmlspecialchars($respuesta->id_comentario);
                                    $fecha = htmlspecialchars($respuesta->fecha_comentario);
                                    $contenido = htmlspecialchars($respuesta->contenido); 
                                ?>
                                <div class="container-fluid bg-light my-3 p-3 border col-11">
                                    <div class="d-flex justify-content-between">
                                        <h2>Usuario</h2>
                                        <h6><?=$fecha?></h6>
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