<?php
    const API_URL ="https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesión de curl; ch = curl handle 
    $ch = curl_init(API_URL);
    //Indicar que queremo recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* Ejecutar la petición y guardamos el resultado */
    $result = curl_exec($ch);

    //$result = fileget_content(API_URL); Si solo queremos hacer un GET de una API

    $data = json_decode($result, true);
    curl_close($ch);

    //var_dump($data);
?>
<head>
    <meta charset="UTF-8">    
    <title>Marvel</title>
    <meta name="viewport" content="widh=device-width, initial-scale=1.0" />
    <!-- Centered viewport -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >   
</head>
<main>  
    <section>
        <img src="<?= $data["poster_url"];?> " width=" 300" alt="Poster de <?=$data["title"];?> "
        style="border-radius: 20px; justify-content: centre" />
    </section>
    <hgroup>
        <h3><?= $data["title"];?>Se estrena en <?= $data["days_until"];?> días.</h3>
        <p>Fecha de estreno: <?=$data["release_date"];?></p>
        <p>Próxima entrega: <?=$data["following_production"]["title"];?></p>
        <p></p>
    </hgroup>
</main>

<style>
body{
    display: grid;
    place-content: center;
}

section{
    display: flex;
    justify-content: center;
    text-align: center;
}

hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}