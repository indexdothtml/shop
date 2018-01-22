const state = {
    name: 'user',
    addresses: [{
    	id: 1,
        user_id: 1,
        country_id: 'Россия',
        city_id: 'Москва',
    	street: 'Бакинская улица',
        house: '11',
        housing: '1',
        building: '2',
        entrance: '4',
        level: '10',
    	apt: '1'
    }],
    orders: [{
    	id: 1,
    	name: 'Фаллоимитатор',
    	img: 'https://img0.etsystatic.com/135/0/13065784/il_570xN.1012984388_dhtx.jpg',
    	price: '14$',
    	payment_type_id: 'Visa',
    	shipping_date: '12-12-12'
    }],
    errorsData: []
};

export default state;