<section>
    <div class="container-fluid">
         <?php foreach($items as $r):
             $id=htmlspecialchars($r->id_comentario);
             $titulo=htmlspecialchars($r->titulo);
             $fecha=htmlspecialchars($r->fecha_comentario);
             $contenido=htmlspecialchars($r->contenido);   
         ?>
            <div class="container-fluid bg-light">
                <div class="d-flex justify-content-between">
                    <h2><?=$titulo?></h2>
                    <h6><?=$fecha?></h6>
                </div>
                <p><?=$contenido?></p>
            </div>
        <?php endforeach?>
    </div>

</section>