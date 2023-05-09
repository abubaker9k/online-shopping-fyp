<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Model Viewer</title>
    <style>
        body { margin: 0; }
        canvas { display: block; }
    </style>
</head>
<body>
    <script type="module">
        import * as THREE from 'http://127.0.0.1:8000/node_modules/three/build/three.module.js';
    import { OBJLoader } from 'http://127.0.0.1:8000/public/js/OBJLoader.js';
        // import { FBXLoader } from '/path/to/FBXLoader.js';

        let camera, scene, renderer;

        init();
        animate();

        function init() {
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 5;

            scene = new THREE.Scene();

            renderer = new THREE.WebGLRenderer({antialias: true});
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.body.appendChild(renderer.domElement);

            // Load 3D model
            const loader = new OBJLoader(); // Use FBXLoader() for FBX format
            loader.load('D:\\grass.obj', (object) => {
                scene.add(object);
            });

            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);

            const pointLight = new THREE.PointLight(0xffffff, 1);
            pointLight.position.set(5, 5, 5);
            scene.add(pointLight);
        }

        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
    </script>
</body>
</html>

