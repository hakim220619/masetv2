<div class="luas-bangunan-fisik">
    <div class="form-group">
        <label for="nama_lantai" style="font-weight: bold;">Nomor/Nama Lantai (Area)</label>
        <input type="text" class="form-control" id="nama_lantai" placeholder="Contoh: Teras, Basement, Lantai 1 atau Lantai 2 dll">
    </div>

    <div class="form-group">
        <label for="faktor_luas" style="font-weight: bold;">Faktor Pengali Luas</label>
        <div class="radio-group">
            <label><input type="radio" name="faktor_luas" value="1" checked> 1</label>
            <label><input type="radio" name="faktor_luas" value="0.5"> 0.5</label>
        </div>
    </div>

    <div class="form-group">
        <label for="luas_lantai" style="font-weight: bold;">Luas Lantai (m2)</label>
        <input type="number" class="form-control" id="luas_lantai" placeholder="Masukkan angka tanpa m2/spasi">
    </div>

    <canvas id="drawingCanvas" width="600" height="400" style="border:1px solid #000; display: block; margin: 10px auto;"></canvas>

    <div class="navigation-buttons" style="margin-top: 10px;">
        <button class="nav-btn" onclick="moveUp()">&#8593;</button>
        <button class="nav-btn" onclick="moveDown()">&#8595;</button>
        <button class="nav-btn" onclick="moveLeft()">&#8592;</button>
        <button class="nav-btn" onclick="moveRight()">&#8594;</button>
    </div>

    <div class="actions" style="margin-top: 10px;">
        <button onclick="resetCanvas()">🔄 Reset Canvas</button>
        <button onclick="zoomIn()">🔍+ Zoom In</button>
        <button onclick="zoomOut()">🔍- Zoom Out</button>
    </div>
</div>

<script>
    const canvas = document.getElementById('drawingCanvas');
    const ctx = canvas.getContext('2d');

    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;

    canvas.addEventListener('mousedown', (e) => {
        isDrawing = true;
        [lastX, lastY] = [e.offsetX, e.offsetY];
    });

    canvas.addEventListener('mousemove', (e) => {
        if (!isDrawing) return;
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.strokeStyle = '#000';
        ctx.lineWidth = 2;
        ctx.stroke();
        [lastX, lastY] = [e.offsetX, e.offsetY];
    });

    canvas.addEventListener('mouseup', () => (isDrawing = false));
    canvas.addEventListener('mouseout', () => (isDrawing = false));

    function resetCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        alert("Canvas Reset!");
    }
</script>

<style>
    .luas-bangunan-fisik {
        border: 1px solid #ccc;
        padding: 15px;
        margin: 15px 0;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .radio-group label {
        margin-right: 10px;
    }

    canvas {
        cursor: crosshair;
        background-color: #fff;
    }

    .navigation-buttons button,
    .actions button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        margin: 2px;
        border-radius: 4px;
        cursor: pointer;
    }

    .navigation-buttons button:hover,
    .actions button:hover {
        background-color: #0056b3;
    }
</style>