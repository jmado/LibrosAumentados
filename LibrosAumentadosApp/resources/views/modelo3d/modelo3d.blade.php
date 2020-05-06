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
    
    img{
      width: 150px;
    }
    a.iluminacion img, a.iluminacion img{
      width: 60px;
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
                  <a onclick="mas()" class="iluminacion">
                    <img src="{{ URL::asset('complementos/iconos/mas1.png') }}" alt="">
                  </a>
                  @if (isset($libro_id))
                    <a href="{{route('contenido.contenido', $libro_id)}}"> <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt=""></a>
                  @else
                    <a onclick="goBack()">
                      <img src="{{ URL::asset('complementos/iconos/modelo.png') }}" alt="">
                    </a>
                  @endif
                  <a onclick="menos()" class="iluminacion">
                    <img src="{{ URL::asset('complementos/iconos/menos1.png') }}" alt="">
                  </a>
              <script>
                  function goBack() {
                      window.history.back();
                  }
              </script>
              
                    
                    

            </div>
            
            <!-- Modelo 3d -->
            <script>
                let scene, camera, renderer, controls, iluminacion;
                iluminacion = 100;


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

                function mas(){
                  if(iluminacion<=500){
                    
                    directionalLight = new THREE.DirectionalLight(0xffffff,iluminacion);
                    directionalLight.position.set(0,1,0);
                    directionalLight.castShadow = true;
                    scene.add(directionalLight);
                    animate();
                  } 
                  console.log(iluminacion);
                }
                function menos(){
                  if(iluminacion>=100){
                    
                    directionalLight = new THREE.DirectionalLight(0xffffff,-iluminacion);
                    directionalLight.position.set(0,1,0);
                    directionalLight.castShadow = true;
                    scene.add(directionalLight);
                    animate();
                  } 
                  console.log(iluminacion);
                }

                init();

            </script>



        </div>
    </div>
</body>
</html>