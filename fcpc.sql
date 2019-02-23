create table departments(
	did int auto_increment,
	ddesc varchar(100) not null,
	primary key( did )
);

insert into
	departments
		( ddesc )
	values
		( "College of Computer and Information Sciences" ),
		( "College of Engineering and Architecture" ),
		( "College of Arts and Letters" ),
		( "College of Law" ),
		( "College of Accoutancy" ),
		( "College of Communication" );

create table courses(
	cid int auto_increment,
	ccode varchar(50) not null,
	cdesc varchar(50) not null,
	did int not null,
	primary key( cid ),
	foreign key( did ) references departments( did ) on update cascade on delete cascade
);

insert into
	courses(
		ccode,
		cdesc,
		did
	) values(
		"BSIT",
		"Bachelor of Science in Information Technology",
		1
	), (
		"BSCS",
		"Bachelor of Science in Computer Science",
		1
	), (
		"BSCE",
		"Bachelor of Science in Civil Engineering",
		2
	), (
		"BSCoE",
		"Bachelor of Science in Computer Engineering",
		2
	), (
		"BSME",
		"Bachelor of Science in Mechanical Engineering",
		2
	), (
		"BSEE",
		"Bachelor of Science in Electrical Engineering",
		2
	), (
		"BSA",
		"Bachelor of Science in Architecture",
		2
	);

create table year_and_secs(
	yasid int auto_increment,
	yasyear int not null,
	yassection varchar(20) not null,
	cid int not null,
	primary key( yasid ),
	foreign key( cid ) references courses( cid ) on update cascade on delete cascade
);

insert into
	year_and_secs(
		yasyear,
		yassection,
		cid
	) values
		( 1, "1D", 1 ),
		( 1, "2D", 1 ),
		( 1, "3D", 1 ),
		( 1, "1N", 1 ),
		( 1, "2N", 1 ),
		( 1, "3N", 1 ),
		( 2, "1D", 1 ),
		( 2, "2D", 1 ),
		( 2, "3D", 1 ),
		( 2, "1N", 1 ),
		( 2, "2N", 1 ),
		( 2, "3N", 1 ),
		( 3, "1D", 1 ),
		( 3, "2D", 1 ),
		( 3, "3D", 1 ),
		( 3, "1N", 1 ),
		( 3, "2N", 1 ),
		( 3, "3N", 1 ),
		( 4, "1D", 1 ),
		( 4, "2D", 1 ),
		( 4, "3D", 1 ),
		( 4, "1N", 1 ),
		( 4, "2N", 1 ),
		( 4, "3N", 1 );

create table persons(
	pid int auto_increment,
	pcode varchar(50) not null,
	pfname varchar(50) not null,
	pmname varchar(50) not null,
	plname varchar(50) not null,
	ptype int not null,
	primary key( pid )
);

insert into
	persons(
		pcode,
		pfname,
		pmname,
		plname,
		ptype
	) values(
		"123",
		"John",
		"None",
		"Doe",
		1
	), (
		"321",
		"Jane",
		"None",
		"Doe",
		1
	), (
		"456",
		"Wade",
		"Washington",
		"Wilson",
		2
	), (
		"654",
		"Peter",
		"Porter",
		"Parker",
		2
	);

create table subjects(
	sjid int auto_increment,
	sjcode varchar(50) not null,
	sjdesc varchar(100) not null,	
	primary key( sjid )
);

insert into
	subjects(
		sjcode,
		sjdesc
	) values(
		"HUMA 1013",
		"Introduction to Humanities"
	), (
		"MATH 1013",
		"College Algebra"
	), (
		"PSYC 1013",
		"General Psychology"
	), (
		"NASC 2033",
		"College Physics"
	), (
		"ENGL 1033",
		"Speech Communication"
	), (
		"MATH 2033",
		"Plane and Spherical Trigonometry"
	), (
		"PHIL 1013",
		"Logic"
	), (
		"NASC 1093",
		"Ecology"
	), (
		"LITE 1013",
		"World Literature"
	);

create table subject_assignations(
	said int auto_increment,
	sjid int not null,
	yasid int not null,
	profid int not null,
	primary key( said ),
	foreign key( sjid ) references subjects( sjid ) on update cascade on delete cascade,
	foreign key( yasid ) references year_and_secs( yasid ) on update cascade on delete cascade,
	foreign key( profid ) references persons( pid ) on update cascade on delete cascade
);

create table questions(
	qid int auto_increment,
	qdesc varchar(500) not null,
	primary key( qid )
);

insert into 
	questions
		( qdesc )
	values
		( "Integrity" ),
		( "Sportmanship" ),
		( "Courage" );

create table enrolled(
	eid int auto_increment,
	said int not null,
	studid int not null,
	primary key( eid ),
	foreign key( said ) references subject_assignations( said ) on update cascade on delete cascade,
	foreign key( studid ) references persons( pid ) on update cascade on delete cascade
);

create table answers(
	aid int auto_increment,
	qid int not null,
	answer varchar(50) not null,
	eid int not null,
	primary key( aid ),
	foreign key( qid ) references questions( qid ) on update cascade on delete cascade,
	foreign key( eid ) references enrolled( eid ) on update cascade on delete cascade
);