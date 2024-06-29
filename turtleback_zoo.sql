
CREATE TABLE Buildings (
    BuildingID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Purpose VARCHAR(255),
    Floors INT,
    SquareFootage INT
) ENGINE=InnoDB;

CREATE TABLE Employees (
    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Address VARCHAR(255),
    StartDate DATE,
    EmployeeType VARCHAR(50),
    HourlyRate DECIMAL(10, 2)
) ENGINE=InnoDB;


CREATE TABLE EmployeeTypes (
    EmployeeType VARCHAR(50) PRIMARY KEY,
    HourlyRate DECIMAL(10, 2),
    DegreeYear INT,    
    SpeciesSpecialties VARCHAR(255)
) ENGINE=InnoDB;


CREATE TABLE Animals (
    AnimalID INT AUTO_INCREMENT PRIMARY KEY,
    Species VARCHAR(255),
    LocationBuilding VARCHAR(255),
    LocationCage VARCHAR(255),
    BirthYear INT,
    CurrentStatus VARCHAR(50)
) ENGINE=InnoDB;


CREATE TABLE Species (
    SpeciesID INT AUTO_INCREMENT PRIMARY KEY,
    Population INT,
    MonthlyFoodCost DECIMAL(10, 2),
    VeterinarianID INT,
    AnimalCareSpecialistID INT,
    TrainerID INT  
) ENGINE=InnoDB;

CREATE TABLE Attractions (
    AttractionID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    BuildingID INT,
    ShowsPerDay INT,
    TicketPrice DECIMAL(10, 2)
) ENGINE=InnoDB;


CREATE TABLE Shows (
    ShowID INT AUTO_INCREMENT PRIMARY KEY,
    AttractionID INT,
    Date DATE,
    TicketsSold INT,
    RevenueEarned DECIMAL(10, 2)
) ENGINE=InnoDB;

CREATE TABLE EmployeeAttraction (
    EmployeeID INT,
    AttractionID INT,
    PRIMARY KEY (EmployeeID, AttractionID),
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID),
    FOREIGN KEY (AttractionID) REFERENCES Attractions(AttractionID)
) ENGINE=InnoDB;


CREATE TABLE TicketPrices (
    TicketType VARCHAR(50) PRIMARY KEY,
    Price DECIMAL(10, 2),
    EffectiveDate DATE
) ENGINE=InnoDB;


CREATE TABLE AttractionSpecies (
    AttractionID INT,
    SpeciesID INT,
    PRIMARY KEY (AttractionID, SpeciesID),
    FOREIGN KEY (AttractionID) REFERENCES Attractions(AttractionID),
    FOREIGN KEY (SpeciesID) REFERENCES Species(SpeciesID)
) ENGINE=InnoDB;

CREATE TABLE Concessions (
    ConcessionID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    DailyRevenue DECIMAL(10, 2)
) ENGINE=InnoDB;


CREATE TABLE Attendance (
    AttendanceID INT AUTO_INCREMENT PRIMARY KEY,
    AttendeeType VARCHAR(50),
    TicketsSold INT,
    RevenueEarned DECIMAL(10, 2),
    Date DATE
) ENGINE=InnoDB;
-- Insert data into Buildings table
INSERT INTO Buildings (Name, Purpose, Floors, SquareFootage)
VALUES ('Building1', 'Animal Shelter', 2, 2000),
       ('Building2', 'Attraction', 3, 3000),
       ('Building3', 'Maintenance', 1, 1000);

-- Insert data into Employees table
INSERT INTO Employees (Name, Address, StartDate, EmployeeType, HourlyRate)
VALUES ('John Doe', '123 Main St', '2023-01-01', 'Maintenance', 15.00),
       ('Jane Smith', '456 Oak St', '2023-01-15', 'Animal Care Specialist', 18.00),
       ('Bob Johnson', '789 Pine St', '2023-02-01', 'Customer Service', 12.50);

-- Insert data into EmployeeTypes table
INSERT INTO EmployeeTypes (EmployeeType, HourlyRate, DegreeYear, SpeciesSpecialties)
VALUES ('Maintenance', 15.00, NULL, NULL),
       ('Animal Care Specialist', 18.00, 4, 'Big Cats, Elephants'),
       ('Customer Service', 12.50, NULL, NULL);

-- Insert data into Animals table
INSERT INTO Animals (Species, LocationBuilding, LocationCage, BirthYear, CurrentStatus)
VALUES ('Lion', 'Building2', 'Cage1', 2018, 'Healthy'),
       ('Elephant', 'Building2', 'Cage2', 2010, 'Under Medical Care'),
       ('Giraffe', 'Building2', 'Cage3', 2015, 'Maternal Leave');

-- Insert data into Species table
INSERT INTO Species (Population, MonthlyFoodCost, VeterinarianID, AnimalCareSpecialistID, TrainerID)
VALUES (5, 2000.00, 1, 2, 3),
       (2, 3000.00, 1, 2, 3),
       (3, 2500.00, 1, 2, 3);

-- Insert data into Attractions table
INSERT INTO Attractions (Name, BuildingID, ShowsPerDay, TicketPrice)
VALUES ('Monkey Show', 2, 3, 10.00),
       ('Big Cat Show', 2, 2, 12.50),
       ('Aquatic Show', 2, 4, 15.00);

-- Insert data into Shows table
INSERT INTO Shows (AttractionID, Date, TicketsSold, RevenueEarned)
VALUES (1, '2023-11-01', 50, 500.00),
       (2, '2023-11-01', 30, 375.00),
       (3, '2023-11-01', 40, 600.00);

-- Insert data into EmployeeAttraction table
INSERT INTO EmployeeAttraction (EmployeeID, AttractionID)
VALUES (2, 1),
       (3, 2),
       (1, 3);

-- Insert data into TicketPrices table
INSERT INTO TicketPrices (TicketType, Price, EffectiveDate)
VALUES ('Adult', 20.00, '2023-01-01'),
       ('Child', 10.00, '2023-01-01'),
       ('Senior', 15.00, '2023-01-01');

-- Insert data into AttractionSpecies table
INSERT INTO AttractionSpecies (AttractionID, SpeciesID)
VALUES (1, 1),
       (2, 2),
       (3, 3);

-- Insert data into Concessions table
INSERT INTO Concessions (Name, DailyRevenue)
VALUES ('Snack Stand', 150.00),
       ('Drink Stand', 100.00),
       ('Souvenir Shop', 200.00);

-- Insert data into Attendance table
INSERT INTO Attendance (AttendeeType, TicketsSold, RevenueEarned, Date)
VALUES ('Adult', 20, 400.00, '2023-11-01'),
       ('Child', 15, 150.00, '2023-11-01'),
       ('Senior', 10, 150.00, '2023-11-01');
