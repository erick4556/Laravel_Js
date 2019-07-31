<template>
<div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent="savePokemon"><!--Evitar que se envie ese formulario y que se envie a un metodo en vue-->
	        <div class="form-group">
			    <label>Pokemon</label>
			    <!-- vmodel se encarga de hacer el biding de la información-->
			    <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
		  	</div>
		  	<div class="form-group">
			    <label>Descripción</label>
			    <input type="text" class="form-control" placeholder="Ingresa la descripción del pokemon" v-model="descripcion">
		  	</div>
		  	<div class="form-group">
			    <label>Picture</label>
			    <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Save</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script >
	import EventBus from '../../event-bus';
	export default{
		data(){
			return {
				name: null,
				descripcion : null,
				picture : null
			}
		},
		//Sección de métodos
		methods: {
			savePokemon : function(){
				let currentRoute = window.location.pathname
				//Laravel ya va saber que hacer con esta petición lo envia a store
				axios.post(`http://127.0.0.1:8000${currentRoute}/pokemons`,{
					//Envio de información a laravel
					name: this.name,
					descripcion: this.descripcion,
					picture: this.picture
				})
				.then(function(res){
					console.log(res)
					$('#addPokemon').modal('hide'); //Cierra el modal cuando se envia
					EventBus.$emit('pokemon-added',res.data.pokemon) //emitir un evento
					//console.log(res.data.pokemon) //la llave que viene del controlador

				})
				//Tachar los erroes que salgan al momento de hacer la petición
				.catch(function(err){
					console.log(err)
				});	
			}
		}	
	}
</script>

<style>
	
</style>