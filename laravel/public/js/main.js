import * as THREE from './libs/three.module.js';
import { GLTFLoader } from './GLTFLoader.js';
import { TransformControls } from './controls/TransformControls.js';
import { OrbitControls } from './controls/OrbitControls.js';

async function init() {
    // Set up the scene, camera, and renderer
    const container = document.getElementById('modelContainer');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer();
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create and add the PointLight
    const pointLight = new THREE.PointLight(0xffffff, 5, 500);
    pointLight.position.set(10, 10, 10);
    scene.add(pointLight);

    // Load and display the 3D model with lights from Blender
    const loader = new GLTFLoader();
    loader.load('/models/lighting.glb', (gltf) => {
      const object = gltf.scene;
      scene.add(object);

      // Set the camera position
      camera.position.z = 5;

      // Add controls
      const transformControls = new TransformControls(camera, renderer.domElement);
      const orbitControls = new OrbitControls(camera, renderer.domElement);
      orbitControls.enableDamping = true; // Add damping to the controls
      orbitControls.dampingFactor = 0.05;

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
        orbitControls.update(); // Update the orbit controls
        renderer.render(scene, camera);
      };

      animate();
    });
  }

  init();



















// import * as THREE from './libs/three.module.js';
// import { GLTFLoader } from './GLTFLoader.js';
// import { TransformControls } from './controls/TransformControls.js';
// import { OrbitControls } from './controls/OrbitControls.js';

// async function init() {
//   // Set up the scene, camera, and renderer
//   const container = document.getElementById('modelContainer');
//   const modelPath = container.dataset.modelPath; // Get the model path from the data attribute
//   const scene = new THREE.Scene();
//   const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
//   const renderer = new THREE.WebGLRenderer();
//   renderer.setSize(container.clientWidth, container.clientHeight);
//   container.appendChild(renderer.domElement);

//   // Load and display the 3D model with lights from Blender
//   const loader = new GLTFLoader();
//   loader.load('uploads/models/tent.glb', (gltf) => { // Use the modelPath variable here
//     const object = gltf.scene;
//     console.log('Model Path:', modelPath);

//     // Adjust the light intensity if needed
//     object.traverse((node) => {
//       if (node.isLight) {
//         node.intensity *= 1; // Change the value to the desired intensity multiplier
//       }
//     });

//     scene.add(object);

//     // Set the camera position
//     camera.position.z = 5;

//     // Add controls
//     const transformControls = new TransformControls(camera, renderer.domElement);
//     const orbitControls = new OrbitControls(camera, renderer.domElement);
//     orbitControls.enableDamping = true; // Add damping to the controls
//     orbitControls.dampingFactor = 0.05;

//     // Event listeners
//     transformControls.addEventListener('change', () => {
//       renderer.render(scene, camera);
//     });

//     orbitControls.addEventListener('change', () => {
//       renderer.render(scene, camera);
//     });

//     // Render the scene
//     const animate = function () {
//       requestAnimationFrame(animate);
//       orbitControls.update(); // Update the orbit controls
//       renderer.render(scene, camera);
//     };

//     animate();
//   });
// }

// init();









// import * as THREE from './libs/three.module.js';
// import { GLTFLoader } from './GLTFLoader.js';
// import { TransformControls } from './controls/TransformControls.js';
// import { OrbitControls } from './controls/OrbitControls.js';

// async function init() {
//   // Set up the scene, camera, and renderer
//   const container = document.getElementById('modelContainer');
//   const scene = new THREE.Scene();
//   const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
//   const renderer = new THREE.WebGLRenderer();
//   renderer.setSize(container.clientWidth, container.clientHeight);
//   container.appendChild(renderer.domElement);

//   // Load and display the 3D model with lights from Blender
//   const loader = new GLTFLoader();
//   loader.load('/models/lighting.glb', (gltf) => {
//     const object = gltf.scene;

//     // Adjust the light intensity if needed
//     object.traverse((node) => {
//       if (node.isLight) {
//         node.intensity *= 1; // Change the value to the desired intensity multiplier
//       }
//     });

//     scene.add(object);

//     // Set the camera position
//     camera.position.z = 5;

//     // Add controls
//     const transformControls = new TransformControls(camera, renderer.domElement);
//     const orbitControls = new OrbitControls(camera, renderer.domElement);
//     orbitControls.enableDamping = true; // Add damping to the controls
//     orbitControls.dampingFactor = 0.05;

//     // Event listeners
//     transformControls.addEventListener('change', () => {
//       renderer.render(scene, camera);
//     });

//     orbitControls.addEventListener('change', () => {
//       renderer.render(scene, camera);
//     });

//     // Render the scene
//     const animate = function () {
//       requestAnimationFrame(animate);
//       orbitControls.update(); // Update the orbit controls
//       renderer.render(scene, camera);
//     };

//     animate();
//   });
// }

// init();














// working code with textutres
// import * as THREE from './libs/three.module.js';
// import { GLTFLoader } from './GLTFLoader.js';
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
//     const loader = new GLTFLoader();
//     loader.load('/models/grass.glb', (gltf) => {
//         const object = gltf.scene;
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
