var app = new Vue({
  el: '#data-breach-statistics',
  delimiters: ['${', '}'],
  data: {    
	loading: false,
	successfullySent: false,
	timer: '',
	formError: {},
	dataBreachData: {}
  },
  methods:{
	  updateStatistics: function(){
		  if(this.loading) return;
		this.formError = {};
		this.loading = true;
		$('#report-data-breach').request('onUpdateDataBreach', {
			data: {},
			success:  (data) => {
				
				this.loading = false;
				if(data.message)
					this.formError = data.message;
				else{
					this.successfullySent = true;	
					this.dataBreachData = data;
				}	
				//console.log(this.dataBreachData);
			}
		});
	  },
	  cancelTimer () { clearInterval(this.timer) }
  },
  mounted:function(){
	 this.updateStatistics();
	 this.timer = setInterval(this.updateStatistics, 3000)
  }
});

