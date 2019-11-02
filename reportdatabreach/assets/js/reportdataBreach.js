var app = new Vue({
  el: '#report-data-breach',
  delimiters: ['${', '}'],
  data: {
    organization:'',
	pdb:'',
	nrb:'',
	wru:'',
	sou:'Select one if known',
	tob:'Select one if known',
	comments:'',
	formError:{},
	loading: false,
	successfullySent: false
  },
  methods:{
	  saveButton: function(e){
		  e.preventDefault();
		  this.formError = {};
			this.loading = true;
			$('#report-data-breach').request('onSaveBreach', {
				data: {},
				success:  (data) => {
					this.loading = false;
					if(data.message)
						this.formError = data.message;
					else{
						this.successfullySent = true;
						this.organization = '';
						this.pdb = '';
						this.nrb = '';
						this.wru = '';
						this.sou = 'Select one if known';
						this.tob = 'Select one if known';
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

