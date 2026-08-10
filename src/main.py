import os
from sqlalchemy import create_engine, Column, Integer, String, ForeignKey
from sqlalchemy.orm import declarative_base, sessionmaker, relationship, joinedload

Base = declarative_base()

class User(Base):
    __tablename__ = 'users'
    id = Column(Integer, primary_key=True)
    name = Column(String)
    profile = relationship("Profile", uselist=False, back_populates="user")

class Profile(Base):
    __tablename__ = 'profiles'
    id = Column(Integer, primary_key=True)
    user_id = Column(Integer, ForeignKey('users.id'))
    name = Column(String)
    user = relationship("User", back_populates="profile")

def setup_db(db_url="sqlite:///test.db", num_users=1000):
    engine = create_engine(db_url)
    Base.metadata.drop_all(engine)
    Base.metadata.create_all(engine)
    Session = sessionmaker(bind=engine)
    session = Session()

    # Populate data
    for i in range(num_users):
        user = User(name=f"User {i}")
        profile = Profile(name=f"Profile {i}", user=user)
        session.add(user)
        session.add(profile)
    session.commit()

    return session, engine

def process_users(session):
    # Eager load the profile relation to avoid N+1 queries
    users = session.query(User).options(joinedload(User.profile)).all()
    profiles_fetched = 0
    # Simulate processing logic
    for user in users:
        # Accessing the pre-loaded profile
        profile = user.profile
        if profile:
            # print(profile.name) # Disabled print for benchmarking
            profiles_fetched += 1
    return profiles_fetched

if __name__ == "__main__":
    session, engine = setup_db(num_users=100)
    process_users(session)
    print("Run process_users directly finished.")
    session.close()
