<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modelos 3D</title>

<style>
    .contenido-3d{
      width: 100%;
      margin:0px;
      height: 100%;
    }
    .menu-3d{
      
      width: 100%;
      height: 20%;
    }
    .atras-iluminacion-3d{
      position: fixed;
      color: #f1f1f1;
      background: rgba(0, 0, 0, 0.5);
      width: 100%;
      text-align:center;
    }
    a, input{
      display: block;
    }
    input{
      margin: 0 auto;
    }
    img{
      width: 150px;
    }

</style>
  <!-- three js - Modelos3d -->
  <script src="{{ URL::asset('js/three.min.js') }}"></script>
  <script src="{{ URL::asset('js/GLTFLoader.js') }}"></script>
  <script src="{{ URL::asset('js/OrbitControls.js') }}"></script>



</head>
<body>
    <div class="contenido-3d">
        <div class="menu-3d">
            <div class="atras-iluminacion-3d">
              <!-- Boton de atras 
              <button class="btn btn-primary btn-block" role="button" onclick="goBack()">Atras</button>
              -->
                  @if (isset($libro_id))
                    <a href="{{route('contenido.contenido', $libro_id)}}"> <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt=""></a>
                  @else
                    <a onclick="goBack()">
                      <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt="">
                    </a>
                  @endif
                  
              <script>
                  function goBack() {
                      window.history.back();
                  }
              </script>

              <input type="range" name="iluminacion" id="iluminacion" min="100" max="1000" onchange="ilu()">

            </div>
            
            <!-- Modelo 3d -->
            <script>
                let scene, camera, renderer, controls, iluminacion;
                iluminacion = 0;


                function init() {
                  renderer = new THREE.WebGLRenderer({antialias:true});
                  renderer.setSize(window.innerWidth,window.innerHeight);
                  document.body.appendChild(renderer.domElement);

                  scene = new THREE.Scene();
                  scene.background = new THREE.Color(0xdddddd);
                  camera = new THREE.PerspectiveCamera(40,window.innerWidth/window.innerHeight,1,5000);
                  camera.rotation.y = 45/180*Math.PI;
                  camera.position.x = 800;
                  camera.position.y = 100;
                  camera.position.z = 1000;

                  controls = new THREE.OrbitControls(camera, renderer.domElement);

                  controls.addEventListener('change', renderer);
                  hlight = new THREE.AmbientLight (0x404040,100);
                  scene.add(hlight);
                  directionalLight = new THREE.DirectionalLight(0xffffff,100);
                  directionalLight.position.set(0,1,0);
                  directionalLight.castShadow = true;
                  scene.add(directionalLight);

                  //Luces
                  if(iluminacion==0){
                    light = new THREE.PointLight(0xc4c4c4,100);
                    light.position.set(0,300,500);
                    scene.add(light);
                  }
                  else{
                    light = new THREE.PointLight(0xc4c4c4,iluminacion);
                    light.position.set(0,300,500);
                    scene.add(light);
                  }
                  console.log(iluminacion);
                  
                  
                  let loader = new THREE.GLTFLoader();
                  
                  loader.load('{{ URL::asset("modelos3d/$modelo->modelo_3d/scene.gltf") }}', function(gltf){
                    car = gltf.scene.children[0];
                    car.scale.set(0.5,0.5,0.5);
                    scene.add(gltf.scene);
                    animate();
                  });
                }
                function animate() {
                  renderer.render(scene,camera);
                  requestAnimationFrame(animate);
                }

                function ilu(){
                  iluminacion = Math.abs(document.getElementById("iluminacion").value);
                  init();
                }

                init();

            </script>



        </div>
    </div>
</body>
</html>