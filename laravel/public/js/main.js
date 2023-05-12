import * as THREE from './libs/three.module.js';
import { OBJLoader } from './OBJLoader.js';
import { TransformControls } from './controls/TransformControls.js';
import { OrbitControls } from './controls/OrbitControls.js';
import { RGBELoader } from './RGBELoader.js';

async function init() {
    // Set up the scene, camera, and renderer
    const container = document.getElementById('modelContainer');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setClearColor("#233143");
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    container.appendChild(renderer.domElement);

    // Load the HDR texture for the background
    const loader = new RGBELoader();
    const backgroundTexture = await new Promise(resolve => {
        loader.load('/textures/pedestrian_overpass_1k.hdr', resolve);
    });

    // Set the background texture
    scene.background = backgroundTexture;

    // Add a directional light to cast shadows
    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(0, 10, 0);
    directionalLight.castShadow = true;
    directionalLight.shadow.mapSize.width = 1024;
    directionalLight.shadow.mapSize.height = 1024;
    directionalLight.shadow.camera.near = 0.1;
    directionalLight.shadow.camera.far = 100;
    directionalLight.shadow.camera.top = 10;
    directionalLight.shadow.camera.bottom = -10;
    directionalLight.shadow.camera.left = -10;
    directionalLight.shadow.camera.right = 10;
    scene.add(directionalLight);

    // Load and display the 3D model
    const objLoader = new OBJLoader();
    objLoader.load('/models/grass.obj', (object) => {
        object.castShadow = true;
        object.receiveShadow = true;
        scene.add(object);

        // Set the camera position
        camera.position.z = 5;

        // Add controls
        const transformControls = new TransformControls(camera, renderer.domElement);
        const orbitControls = new OrbitControls(camera, renderer.domElement);

        // Event listeners
        transformControls.addEventListener('change', () => {
            renderer.render(scene, camera);
        });

        orbitControls.addEventListener('change', () => {
            renderer.render(scene, camera);
        });

        // Render the scene
        const animate = function () {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        };

        animate();
    });
}

init();





// workingcode 3D
// import * as THREE from './libs/three.module.js';
// import { OBJLoader } from './OBJLoader.js';
// import { TransformControls } from './controls/TransformControls.js';
// import { OrbitControls } from './controls/OrbitControls.js';

// async function init() {
//     // Set up the scene, camera, and renderer
//     const container = document.getElementById('modelContainer');
//     const scene = new THREE.Scene();
//     const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
//     const renderer = new THREE.WebGLRenderer();
//     renderer.setSize(container.clientWidth, container.clientHeight);
//     container.appendChild(renderer.domElement);

//     // Add a light source
//     const light = new THREE.AmbientLight(0xffffff);
//     scene.add(light);

//     // Load and display the 3D model
//     const loader = new OBJLoader();
//     loader.load('/models/grass.obj', (object) => {
//         scene.add(object);

//         // Set the camera position
//         camera.position.z = 5;

//         // Add controls
//         const transformControls = new TransformControls(camera, renderer.domElement);
//         const orbitControls = new OrbitControls(camera, renderer.domElement);

//         // Event listeners
//         transformControls.addEventListener('change', () => {
//             renderer.render(scene, camera);
//         });

//         orbitControls.addEventListener('change', () => {
//             renderer.render(scene, camera);
//         });

//         // Render the scene
//         const animate = function () {
//             requestAnimationFrame(animate);
//             renderer.render(scene, camera);
//         };

//         animate();
//     });
// }

// init();
