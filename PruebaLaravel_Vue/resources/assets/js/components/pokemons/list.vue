<template>

	<div class="row">
		<spinner v-show="loading"></spinner>
	
		<div class="col-sm" v-for="pokemon in pokemons"> <!--Se hace la iteración-->	
		<div class="card text-center" style="width: 18rem; margin-top: 70px;">
			<img style="height: 100px; width: 100px; background-color: #efefef; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" v-bind:src="pokemon.picture" alt="">
		  <div class="card-body">
		    <h5 class="card-title">{{pokemon.name}}</h5>
		    <p class="card-text">{{pokemon.descripcion}}</p>
		    <a href="/trainers/" class="btn btn-primary">Ver mas..</a><!--Se envia el slug para no mostrar el id en la ruta -->
		  </div>
		</div>
		</div>

</div>

</template>

<script>
	import EventBus from '../../event-bus';
	//Para hacer funcionar el script
	export default{
		//Retornar la data
	data(){
		return{
			//Retorn colección de datos
			pokemons:[],
			loading : true
		}
	},
		//Ciclo de vida
		//Se va ejecutar cuando el componente ha sido creado
		created(){
			 //Se va escuchar 
			EventBus.$on('pokemon-added', data =>{
				this.pokemons.push(data) //Para agregar un nuevo componente a un array.
			})
		},
		//Ciclo de vida el componente
		 mounted() {
           // console.log('Component mounted.')
           //Uso de axios
           let currentRoute = window.location.pathname
           axios
           		.get(`http://127.0.0.1:8000${currentRoute}/pokemons`)
           		.then((res) =>{ //Para llevar una evaluación más a fondo de los daros que vamos a recibir.
           			console.log(res)
           			this.pokemons = res.data//El response lo daría laravel
           			this.loading = false
           		}) 
        }
	}

</script>