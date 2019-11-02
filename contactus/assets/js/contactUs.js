var app = new Vue({
  el: '#contactUs-form',
  delimiters: ['${', '}'],
  data: {
    name:'',
	email:'',
	phone:'',
	comments:'',
	formError:{},
	loading: false,
	successfullySent: false
  },
  methods:{
	  sendButton: function(e){
		  e.preventDefault();
		  this.formError = {};
			this.loading = true;
			$('#contactUs-form form').request('onSaveContactUs', {
				data: {},
				success:  (data) => {
					this.loading = false;
					if(data.message)
						this.formError = data.message;
					else{
						this.successfullySent = true;
						this.name = '';
						this.email = '';
						this.phone = '';
						this.comments = '';
					}					
				},
				error: (data) => {
					console.error(data);
				},
				complete: (data) => {
					this.loading = false;										
				}
			});
	  }
  },
  mounted:function(){
	  
  }
});

