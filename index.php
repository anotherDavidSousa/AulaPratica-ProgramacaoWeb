<?php include("layouts/header.php"); ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Descubra seu signo zodiacal</h1>
    <form action="show_zodiac_sign.php" method="POST" class="card p-4 mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input 
                type="date" 
                class="form-control" 
                id="data_nascimento" 
                name="data_nascimento" 
                required
            >
        </div>
        <button type="submit" class="btn btn-primary">Descobrir</button>
    </form>
</div>

</body>
</html>