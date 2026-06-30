<!-- HTML -->
<head>
        <h1>Gestor de Tareas</h1>
</head>
<body>
        <form method="POST" action="">
                <h2>Registrar tarea</h2>
                <label for "titulo">Ingresa el titulo:</label>
                <input type="text" name="titulo">
                <label for "prioridad">Establece la prioridad</label>
                <select name="prioridad" id="prioridad_select">
                        <option value="">--Por favor seleccione una opción--</o>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>
                <button type="submit">Registrar</button>
        </form>
</body>
