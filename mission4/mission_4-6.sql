-- tableの作成
create table test02
(id int(11) PRIMARY KEY AUTO_INCREMENT,
 name varchar(10),
 fav varchar(10)
);

-- レコードの挿入
INSERT INTO test02 (name, fav) VALUES 
( "masashi", "tennis");

select * from test02; 

-- レコードの更新
UPDATE test02 set name = "massi" where id = 2;

select * from test02; 