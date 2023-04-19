const container = document.getElementById('container');
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();

renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);

const loader = new THREE.OBJLoader();

loader.load('{{ asset("storage/models/coffee.obj") }}', function(object) {
  scene.add(object);
  camera.position.z = 5;
  animate();
}, undefined, function(error) {
  console.error(error);
});

function animate() {
  requestAnimationFrame(animate);
  renderer.render(scene, camera);
}
